<x-guest-layout>
    <section class="min-h-screen flex items-center justify-center py-24 mt-[80px] px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8">
            <div class="text-center">
              
                <h2 class="text-3xl font-bold text-hw-blue">Login</h2>
            </div>

            <div class="bg-white rounded-lg shadow-lg p-8">
                
                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <form method="POST" action="{{ route('login') }}" class="space-y-6">
                    @csrf

                    <!-- Email Address -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Username</label>
                        <input id="email" 
                               type="email" 
                               name="email" 
                               value="{{ old('email') }}" 
                               required autofocus autocomplete="username"
                               placeholder="Enter your email"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-hw-green focus:border-transparent transition-colors" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                        <input id="password"
                               type="password"
                               name="password"
                               required autocomplete="current-password"
                               placeholder="Enter your password"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-hw-green focus:border-transparent transition-colors" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Remember Me + Forgot Password -->
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <input id="remember_me"
                                   type="checkbox"
                                   name="remember"
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
                    <button type="submit"
                            class="w-full bg-hw-green hover:bg-green-400 text-hw-blue font-semibold py-3 px-4 rounded-lg transition-colors focus:outline-none focus:ring-2 focus:ring-hw-green focus:ring-offset-2">
                        <i data-lucide="log-in" class="h-5 w-5 inline mr-2"></i>
                        Sign In
                    </button>

                    @include('auth.google-button')

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
