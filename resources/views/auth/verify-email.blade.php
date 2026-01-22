<x-guest-layout>

    <x-page-header image="assets/img/3.webp" title="Verify Your Email"
        description="Before continuing, please verify your email address using the link we sent you." />

    <section class="-mt-32 pb-20 relative z-10 mx-4">
        <div class="max-w-lg w-full mx-auto">

            <div class="bg-white rounded-lg  overflow-hidden  p-8">


                @if (session('status') == 'verification-link-sent')
                    <div class="font-medium text-sm text-green-600 bg-green-50 border border-green-200 rounded-lg p-4">
                        {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                    </div>
                @endif

                <p class="text-sm text-gray-600 mt-4 text-center">
                    Thanks for signing up. Please verify your email address by clicking the link we just emailed to you.
                    If you did not receive the email, you can request another below.
                </p>

                <div class="space-y-4">

                    <!-- Resend Verification -->
                    <form method="POST" action="{{ route('verification.send') }}">
                        @csrf


                        <x-loading-button text="Resend Verification Email"
                            class="w-full flex items-center justify-center mt-4 space-x-2 bg-hw-green hover:bg-hw-blue text-white font-semibold py-3 rounded-lg
                        transition
                        " />
                    </form>

                    <!-- Logout -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
                            class="w-full border border-gray-300 text-gray-700 hover:bg-gray-50 hover:border-gray-400 font-medium py-3 px-4 rounded-lg transition-colors focus:outline-none focus:ring-2 focus:ring-hw-blue focus:ring-offset-2">
                            <i data-lucide="log-out" class="h-5 w-5 inline mr-2"></i>
                            {{ __('Log Out') }}
                        </button>
                    </form>

                </div>

            </div>

        </div>
    </section>

</x-guest-layout>
