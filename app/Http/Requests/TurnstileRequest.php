<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Http;
use Illuminate\Validation\ValidationException;

class TurnstileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
     public function rules(): array
    {
        // Skip requirement in local environment
        if (app()->environment('local')) {
            return [];
        }

        return [
            'cf-turnstile-response' => ['required', 'string'],
        ];
    }


        public function messages(): array
    {
        return [
            'cf-turnstile-response.required' => 'Please complete the security check.',
        ];
    }

     protected function passedValidation(): void
    {
        // Skip validation in local environment
        if (app()->environment('local')) {
            return;
        }

        $token = $this->input('cf-turnstile-response');

        $response = Http::timeout(5)
            ->asForm()
            ->post('https://challenges.cloudflare.com/turnstile/v0/siteverify', [
                'secret'   => config('services.turnstile.secret'),
                'response' => $token,
                'remoteip' => $this->ip(),
            ]);

        $json = $response->json();

        if (! $response->ok() || empty($json['success'])) {
            throw ValidationException::withMessages([
                'cf-turnstile-response' => 'Security check failed. Try again.',
            ]);
        }
    }


}
