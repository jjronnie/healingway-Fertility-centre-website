<x-guest-layout>

    <x-page-header
        image="assets/img/3.webp"
        title="Forgot Password"
        description="Enter your email address and we will send you a link to reset your password."
    />

    <section class="-mt-32 pb-20 relative z-10 mx-4">
        <div class="max-w-lg w-full mx-auto">

            <div class="bg-gray-100 rounded-lg p-8 space-y-6">

                <!-- Description -->
                <p class="text-lg text-gray-600 text-center">
                    {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
                </p>

                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <form method="POST" action="{{ route('password.email') }}" class="space-y-6">
                    @csrf

                    <!-- Email Address -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                            {{ __('Email Address') }}
                        </label>

                        <input
                            id="email"
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
                            required
                            autofocus
                            placeholder="Enter your email address"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-hw-green focus:border-transparent transition-colors"
                        />

                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Submit Button -->
                    <button
                        type="submit"
                        class="w-full bg-hw-green hover:bg-green-400 text-hw-blue font-semibold py-3 px-4 rounded-lg transition-colors focus:outline-none focus:ring-2 focus:ring-hw-green focus:ring-offset-2"
                    >
                        <i data-lucide="mail" class="h-5 w-5 inline mr-2"></i>
                        {{ __('Email Password Reset Link') }}
                    </button>

                </form>

            </div>

        </div>
    </section>

</x-guest-layout>
