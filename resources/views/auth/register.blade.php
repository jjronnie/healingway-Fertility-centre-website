<x-guest-layout>
    <section class="min-h-screen flex items-center justify-center py-24 mt-[80px] px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8">
            <div class="text-center">
              
                <h2 class="text-3xl font-bold text-hw-blue">Create an Account</h2>
            </div>

            <div class="bg-white rounded-lg shadow-lg p-8">
                <form method="POST" action="{{ route('register') }}" class="space-y-6">
                    @csrf

                    <!-- Name -->
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Name</label>
                        <input id="name"
                               type="text"
                               name="name"
                               value="{{ old('name') }}"
                               required autofocus autocomplete="name"
                               placeholder="Enter your full name"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-hw-green focus:border-transparent transition-colors" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <!-- Email -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                        <input id="email"
                               type="email"
                               name="email"
                               value="{{ old('email') }}"
                               required autocomplete="username"
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
                               required autocomplete="new-password"
                               placeholder="Enter your password"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-hw-green focus:border-transparent transition-colors" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Confirm Password -->
                    <div>
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-2">Confirm Password</label>
                        <input id="password_confirmation"
                               type="password"
                               name="password_confirmation"
                               required autocomplete="new-password"
                               placeholder="Confirm your password"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-hw-green focus:border-transparent transition-colors" />
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>

                    <!-- Submit -->
                    <button type="submit"
                            class="w-full bg-hw-green hover:bg-green-400 text-hw-blue font-semibold py-3 px-4 rounded-lg transition-colors focus:outline-none focus:ring-2 focus:ring-hw-green focus:ring-offset-2">
                        <i data-lucide="user-plus" class="h-5 w-5 inline mr-2"></i>
                        Register
                    </button>

                    @include('auth.google-button')


                    <!-- Login link -->
                    <div class="text-center">
                        <p class="text-sm text-gray-600">
                            Already registered?
                            <a href="{{ route('login') }}" class="text-hw-blue hover:underline font-medium">
                                Log in
                            </a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </section>
</x-guest-layout>
