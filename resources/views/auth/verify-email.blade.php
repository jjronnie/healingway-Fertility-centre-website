<x-guest-layout>
    <section class="min-h-screen flex items-center justify-center py-24 mt-[80px] px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8">
            <div class="text-center">
                <h2 class="text-3xl font-bold text-hw-blue">Verify Your Email</h2>
                <p class="mt-2 text-sm text-gray-600">
                    Thanks for signing up! Before getting started, please verify your email by clicking the link we just sent. 
                    If you didn’t receive the email, we can send you another.
                </p>
            </div>

            <div class="bg-white rounded-lg shadow-lg p-8 space-y-6">

                @if (session('status') == 'verification-link-sent')
                    <div class="mb-4 font-medium text-sm text-green-600 bg-green-50 border border-green-200 rounded-lg p-3">
                        {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                    </div>
                @endif

                <div class="space-y-4">

                    <!-- Resend Verification -->
                    <form method="POST" action="{{ route('verification.send') }}">
                        @csrf
                        <button type="submit"
                                class="w-full bg-hw-green hover:bg-green-400 text-hw-blue font-semibold py-3 px-4 rounded-lg transition-colors focus:outline-none focus:ring-2 focus:ring-hw-green focus:ring-offset-2">
                            {{ __('Resend Verification Email') }}
                        </button>
                    </form>

                    <!-- Logout -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
                                class="w-full text-gray-700 border border-gray-300 hover:border-gray-400 hover:bg-gray-50 rounded-lg py-3 px-4 font-medium transition-colors focus:outline-none focus:ring-2 focus:ring-hw-blue focus:ring-offset-2">
                            {{ __('Log Out') }}
                        </button>
                    </form>

                </div>

            </div>
        </div>
    </section>
</x-guest-layout>
