<x-guest-layout>

    <x-page-header image="assets/img/3.webp" title="Login"
        description="Please enter your credentials to access your account." />

    <section class="-mt-32 pb-20 relative z-10 mx-4">
        <div class="max-w-lg w-full mx-auto">

            <div class="bg-white rounded-lg  overflow-hidden  p-8">

                    @include('auth.google-button')


                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <form method="POST" action="{{ route('login') }}" class="space-y-6">
                    @csrf

                    <!-- Email Address -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Username</label>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required
                            autofocus autocomplete="username" placeholder="Enter your email"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-hw-green focus:border-transparent transition-colors" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                        <input id="password" type="password" name="password" required autocomplete="current-password"
                            placeholder="Enter your password"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-hw-green focus:border-transparent transition-colors" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>


                    @include('auth.cloudflare')


                    <!-- Remember Me + Forgot Password -->
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <input id="remember_me" type="checkbox" name="remember"
                                class="h-4 w-4 text-hw-green focus:ring-hw-green border-gray-300 rounded">
                            <label for="remember_me" class="ml-2 block text-sm text-gray-700">
                                Remember me
                            </label>
                        </div>

                        @if (Route::has('password.request'))
                            <div class="text-sm">
                                <a href="{{ route('password.request') }}" class="text-hw-blue hover:underline">
                                    Forgot your password?
                                </a>
                            </div>
                        @endif
                    </div>

                    <!-- Submit Button -->


                    <x-loading-button text="Sign in"
                        class="w-full flex items-center justify-center space-x-2 bg-hw-green hover:bg-hw-blue text-white font-semibold py-3 rounded-lg
                        transition
                        " />


                    <!-- Register Link -->
                    @if (Route::has('register'))
                        <div class="text-center">
                            <p class="text-sm text-gray-600">
                                Don’t have an account?
                                <a href="{{ route('register') }}" class="text-hw-blue hover:underline font-medium">
                                    Register here
                                </a>
                            </p>
                        </div>
                    @endif
                </form>
            </div>
        </div>
    </section>
</x-guest-layout>
