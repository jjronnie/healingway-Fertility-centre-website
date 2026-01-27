<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;

class SocialLoginController extends Controller
{
    public function redirect(string $provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function callback(string $provider)
    {
        try {
            $socialUser = Socialite::driver($provider)->user();

            $providerId = $socialUser->getId();
            $email = $socialUser->getEmail();
            $name = $socialUser->getName() ?? 'User';

            $providerColumn = "{$provider}_id";

            // 1. Find by provider ID
            $user = User::where($providerColumn, $providerId)->first();

            // 2. Fallback to email
            if (!$user && $email) {
                $user = User::where('email', $email)->first();
            }

            if ($user) {
                // Attach provider ID if missing
                if (empty($user->$providerColumn)) {
                    $user->$providerColumn = $providerId;
                }

                if (is_null($user->email_verified_at) && $email) {
                    $user->email_verified_at = now();
                }

                $user->save();
            } else {
                if (!$email) {
                    return redirect(route('login'))->withErrors([
                        "{$provider}_error" => "Unable to authenticate with {$provider}. Email is required."
                    ]);
                }

                $user = User::create([
                    'name' => $name,
                    'email' => $email,
                    'password' => Hash::make(Str::random(32)),
                    $providerColumn => $providerId,
                    'signup_method' => $provider,
                    'status' => 'active',
                    'email_verified_at' => now(),
                ]);

                // ✅ Assign Spatie role ONCE
                $user->assignRole('user');
                

               
            }

            Auth::login($user, true);

            return redirect()
                ->intended(route('dashboard', absolute: false))
                ->with('show_welcome', true)
                ->with('success', "Login successful. Welcome back {$user->name}.");
        } catch (\Throwable $e) {
            Log::error(ucfirst($provider) . ' login error: ' . $e->getMessage());

            return redirect(route('login'))->withErrors([
                "{$provider}_error" => "Unable to authenticate with {$provider}. Try again."
            ]);
        }
    }
}
