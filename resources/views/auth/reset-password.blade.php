<x-guest-layout>

    <x-page-header
        image="assets/img/3.webp"
        title="Reset Password"
        description="Create a new password to regain access to your account."
    />

    <section class="-mt-32 pb-20 relative z-10 mx-4">
        <div class="max-w-lg w-full mx-auto">

            <div class="bg-gray-100 rounded-lg p-8 space-y-6">

                <form method="POST" action="{{ route('password.store') }}" class="space-y-6">
                    @csrf

                    <!-- Password Reset Token -->
                    <input type="hidden" name="token" value="{{ $request->route('token') }}">

                    <!-- Email Address -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                            {{ __('Email Address') }}
                        </label>

                        <input
                            id="email"
                            type="email"
                            name="email"
                            value="{{ old('email', $request->email) }}"
                            required
                            readonly
                            autofocus
                            autocomplete="username"
                            placeholder="Enter your email address"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-hw-green focus:border-transparent transition-colors"
                        />

                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-2">
                            {{ __('New Password') }}
                        </label>

                        <input
                            id="password"
                            type="password"
                            name="password"
                            required
                            autocomplete="new-password"
                            placeholder="Enter a new password"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-hw-green focus:border-transparent transition-colors"
                        />

                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Confirm Password -->
                    <div>
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-2">
                            {{ __('Confirm Password') }}
                        </label>

                        <input
                            id="password_confirmation"
                            type="password"
                            name="password_confirmation"
                            required
                            autocomplete="new-password"
                            placeholder="Confirm your new password"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-hw-green focus:border-transparent transition-colors"
                        />

                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>

                    <!-- Submit Button -->
                    <button
                        type="submit"
                        class="w-full bg-hw-green hover:bg-green-400 text-hw-blue font-semibold py-3 px-4 rounded-lg transition-colors focus:outline-none focus:ring-2 focus:ring-hw-green focus:ring-offset-2"
                    >
                        <i data-lucide="lock" class="h-5 w-5 inline mr-2"></i>
                        {{ __('Reset Password') }}
                    </button>

                </form>

            </div>

        </div>
    </section>

</x-guest-layout>
