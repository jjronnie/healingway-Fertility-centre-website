<x-guest-layout>

    <x-page-header title=" " description=" " />

    <!-- Welcome Section -->
    <section class="-mt-32 pb-20 relative z-10">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white rounded-3xl shadow-lg p-8 md:p-12">

                <!-- Welcome Message -->
                <div class="mb-10 text-center">
                    <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">Book an Appointment!</h1>
                    <p class="text-lg text-gray-600 leading-relaxed">
                        Thank you for taking this important step towards your fertility journey. We're honored you've chosen HealingWay Fertility Centre to be part of your story.
                    </p>
                    <div class="h-1 w-20 bg-hw-blue rounded mx-auto mt-4"></div>
                </div>

                <!-- Information Box -->
                <div class="bg-blue-50 rounded-xl p-8 mb-10 border border-blue-200">
                    <div class="text-center mb-6">
                        <h2 class="text-2xl font-bold text-gray-900 mb-4">One Simple Step</h2>
                        <p class="text-gray-700 mb-4">
                            To book your appointment, you'll need to create an account with us. Don't worry—it's quick and easy!
                        </p>
                    </div>

                    <div class="space-y-3 text-gray-700">
                        <div class="flex items-start gap-3">
                            <div class="w-8 h-8 bg-hw-blue rounded-full flex items-center justify-center flex-shrink-0 mt-0.5">
                                <span class="text-white font-semibold text-sm">1</span>
                            </div>
                            <div>
                                <p class="font-semibold text-gray-900">Create Your Account</p>
                                <p class="text-sm text-gray-600">Simply sign up with your email address</p>
                            </div>
                        </div>

                        <div class="flex items-start gap-3">
                            <div class="w-8 h-8 bg-hw-blue rounded-full flex items-center justify-center flex-shrink-0 mt-0.5">
                                <span class="text-white font-semibold text-sm">2</span>
                            </div>
                            <div>
                                <p class="font-semibold text-gray-900">Verify Your Email</p>
                                <p class="text-sm text-gray-600">You're all set and ready to go</p>
                            </div>
                        </div>

                        <div class="flex items-start gap-3">
                            <div class="w-8 h-8 bg-hw-blue rounded-full flex items-center justify-center flex-shrink-0 mt-0.5">
                                <span class="text-white font-semibold text-sm">3</span>
                            </div>
                            <div>
                                <p class="font-semibold text-gray-900">Book Your Appointment</p>
                                <p class="text-sm text-gray-600">Choose your preferred date, time, and service</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="border-t border-gray-200 pt-8">
                    <p class="text-center text-gray-700 mb-6">
                        <span class="font-semibold">Don't have an account yet?</span><br> Create one in less than a minute!
                    </p>
                    
                    <div class="flex flex-col sm:flex-row gap-4 justify-center">
                        <a href="{{ route('register') }}" class="btn inline-flex items-center justify-center text-center">
                            Create Account
                            <i data-lucide="user-plus" class="w-4 h-4 ml-2"></i>

                        </a>
                       
                    </div>

                    <p class="text-center text-sm text-gray-600 mt-6">
                        <span class="font-semibold">Already have an account?</span> <br> Just click "Sign In" above to access your account and book your appointment right away.
                    </p>

                     <div class="flex flex-col sm:flex-row gap-4 pt-4 justify-center">
                      
                        <a href="{{ route('login') }}" class="btn-success inline-flex items-center justify-center text-center">
                            Sign In
                            <i data-lucide="log-in" class="w-4 h-4 ml-2"></i>

                        </a>
                    </div>
                </div>

            </div>
        </div>
    </section>

  





</x-guest-layout>