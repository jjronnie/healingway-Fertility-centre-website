<x-guest-layout>

    {{-- nav --}}
    @include('frontend.layouts.page-title')


    <!-- Contact Section -->
    <section class="py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                <!-- Contact Form -->
                <div class="bg-white p-8 rounded-2xl shadow-lg">
                    <h2 class="text-3xl font-bold text-primary-800 mb-6">Send us a Message</h2>
                    <form x-data="contactForm()" @submit.prevent="submitForm" class="space-y-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Full Name</label>
                                <input type="text" x-model="form.name" required
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-accent-400 focus:border-accent-400 transition-all">
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Phone Number</label>
                                <input type="tel" x-model="form.phone" required
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-accent-400 focus:border-accent-400 transition-all">
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Email Address</label>
                            <input type="email" x-model="form.email" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-accent-400 focus:border-accent-400 transition-all">
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Message</label>
                            <textarea x-model="form.message" required rows="4"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-accent-400 focus:border-accent-400 transition-all"
                                placeholder="Please describe your inquiry..."></textarea>
                        </div>
                        <button type="submit"
                            class="w-full bg-gradient-to-r from-accent-400 to-accent-500 text-primary-800 font-semibold py-3 px-6 rounded-lg hover:shadow-lg transition-all transform hover:-translate-y-1">
                            <span x-show="!loading">Send Message</span>
                            <span x-show="loading">Sending...</span>
                        </button>
                    </form>
                </div>

                <!-- Contact Information -->
                <div class="space-y-8">
                    <!-- Contact Details -->
                    <div class="bg-white p-8 rounded-2xl shadow-lg">
                        <h3 class="text-2xl font-bold text-primary-800 mb-6">Contact Information</h3>
                        <div class="space-y-6">
                            <div class="flex items-start space-x-4">
                                <div class="bg-accent-400 p-3 rounded-lg">
                                    <i data-lucide="map-pin" class="w-6 h-6 text-primary-800"></i>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-900">Address</h4>
                                    <p class="text-gray-600">Plot 6A2-7B2 Luthuli 5th Close, <br>Bugolobi, Kampala
                                        Uganda.</p>
                                </div>
                            </div>
                            <div class="flex items-start space-x-4">
                                <div class="bg-accent-400 p-3 rounded-lg">
                                    <i data-lucide="phone" class="w-6 h-6 text-primary-800"></i>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-900">Phone</h4>
                                    <p class="text-gray-600">+256 700 521 155</p>
                                </div>
                            </div>
                            <div class="flex items-start space-x-4">
                                <div class="bg-accent-400 p-3 rounded-lg">
                                    <i data-lucide="mail" class="w-6 h-6 text-primary-800"></i>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-900">Email</h4>
                                    <p class="text-gray-600">info.ivf@healingwayafrica.com</p>
                                </div>
                            </div>

                        </div>
                    </div>



                    <!-- Emergency Contact -->
                    <div class="bg-white border border-gray-200 p-6 rounded-2xl">
                        <div class="flex items-center space-x-3 mb-4">
                            <i data-lucide="message-square" class="w-6 h-6 text-green-600"></i>
                            <h3 class="text-xl font-bold text-green-800">Whatsapp</h3>
                        </div>
                        <p class="text-gray-700 mb-2">Contact Our Support Team</p>
                        <p class="text-2xl font-bold text-gray-800">+256 700 521 155</p>

                    </div>

                    <!-- Social Media Card -->
                    <div class="bg-gray-50 border border-gray-200 p-6 rounded-2xl">
                        <h3 class="text-xl font-bold text-gray-800">Social Media</h3>
                        <div class="flex justify-center space-x-6">

                            <a href="https://facebook.com" target="_blank"
                                class="text-gray-600 hover:text-blue-600 transition-colors">
                                <i data-lucide="facebook" class="w-6 h-6"></i>
                            </a>
                            <a href="https://x.com" target="_blank"
                                class="text-gray-600 hover:text-black transition-colors">
                                <i data-lucide="twitter" class="w-6 h-6"></i>
                            </a>
                            <a href="https://tiktok.com" target="_blank"
                                class="text-gray-600 hover:text-pink-600 transition-colors">
                                <i data-lucide="music" class="w-6 h-6"></i>
                            </a>
                            <a href="https://instagram.com" target="_blank"
                                class="text-gray-600 hover:text-purple-600 transition-colors">
                                <i data-lucide="instagram" class="w-6 h-6"></i>
                            </a>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <!-- Map Section -->
    <!-- Map Section -->
    <section class="py-16 bg-gray-100">
        <div class="mx-4 md:mx-16">
            <div class="relative w-full h-0 pb-[30%] overflow-hidden rounded-lg shadow-lg">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.760447684096!2d32.6245621748024!3d0.3086016996883756!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x177dbb4075ce764d%3A0x1eb79aa9180ae71b!2sHealingway%20Hospital%20Bugolobi!5e0!3m2!1sen!2sug!4v1755982997493!5m2!1sen!2sug"
                    class="absolute top-0 left-0 w-full h-full border-0" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
        </div>
    </section>




</x-guest-layout>
