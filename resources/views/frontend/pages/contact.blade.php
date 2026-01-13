<x-guest-layout>

    <x-page-header image="assets/img/3.webp" title="Contact Us"
        description="Have questions,  inquiries, or want to get in touch? We're here to help. Contact us by email, phone, or using the form below." />



    <!-- Contact Section -->
    <section class="-mt-32 pb-20 relative z-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 bg-white p-8 rounded-2xl shadow-lg">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                <!-- Contact Form -->
                <div class="">
                    <h2 class="text-3xl font-bold text-primary-800 mb-6">Send us a Message</h2>
                    <form x-data="contactForm()" @submit.prevent="submitForm" class="space-y-6">

                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Full Name <x-required-mark/></label>
                            <input type="text" x-model="form.name" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-accent-400 focus:border-accent-400 transition-all">
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Email Address<x-required-mark/></label>
                                <input type="email" x-model="form.email" required
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-accent-400 focus:border-accent-400 transition-all">
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Phone Number<x-required-mark/></label>
                                <input type="tel" x-model="form.phone" required
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-accent-400 focus:border-accent-400 transition-all">
                            </div>
                        </div>


                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Subject<x-required-mark/></label>
                            <input type="text" x-model="form.subject" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-accent-400 focus:border-accent-400 transition-all">
                        </div>


                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Message<x-required-mark/></label>
                            <textarea x-model="form.message" required rows="4"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-accent-400 focus:border-accent-400 transition-all"
                                placeholder="Please describe your inquiry..."></textarea>
                        </div>
                        <button type="submit" class="btn">
                            Send Message
                        </button>
                    </form>
                </div>

                <!-- Contact Card -->
                <div class="bg-hw-blue rounded-3xl shadow-xl overflow-hidden text-white">

                    <!-- Email -->
                    <div class="p-8 flex items-start gap-4">
                        <div class="mt-1">
                            <i data-lucide="mail" class="w-7 h-7 text-hw-green"></i>
                        </div>

                        <div>
                            <h3 class="text-2xl font-bold mb-2">Send us an e-mail</h3>
                            <p class="text-white/80 mb-4">
                                We'd love to hear from you. Please feel free to reach out to us via mail.
                            </p>

                            <a href="mailto:info.ivf@healingwayafrica.com"
                                class="inline-block bg-white text-hw-blue font-semibold px-5 py-2 rounded-full hover:bg-gray-100 transition">
                                info.ivf@healingwayafrica.com
                            </a>
                        </div>
                    </div>

                    <div class="border-t border-white/15 mx-8"></div>

                    <!-- Phone -->
                    <div class="p-8 flex items-start gap-4">
                        <div class="mt-1">
                            <i data-lucide="phone" class="w-7 h-7 text-hw-green"></i>
                        </div>

                        <div>
                            <h3 class="text-2xl font-bold mb-2">Give us a call</h3>
                            <p class="text-white/80 mb-4">
                                Prefer to talk on phone. Do not hesitate to reach out to us.
                            </p>

                            <a href="tel:+256700521155"
                                class="inline-block bg-white text-hw-blue font-semibold px-5 py-2 rounded-full hover:bg-gray-100 transition">
                                +256 700 521 155
                            </a>
                        </div>
                    </div>

                    <div class="border-t border-white/15 mx-8"></div>

                    <!-- Location -->
                    <div class="p-8 flex items-start gap-4">
                        <div class="mt-1">
                            <i data-lucide="map-pin" class="w-7 h-7 text-hw-green"></i>
                        </div>

                        <div>
                            <h3 class="text-2xl font-bold mb-2">Locate us</h3>
                            <p class="text-white/80 mb-4 leading-relaxed">
                                Plot 6A2-7B2 Luthuli 5th Close,<br>
                                Bugolobi, Kampala, Uganda.
                            </p>

                            <a href="https://maps.google.com" target="_blank"
                                class="inline-block bg-white text-hw-blue font-semibold px-5 py-2 rounded-full hover:bg-gray-100 transition">
                                Get Directions
                            </a>
                        </div>
                    </div>

                    <div class="border-t border-white/15 mx-8"></div>

                    <!-- Social -->
                    <div class="p-8">
                        <div class="flex items-center gap-4 mb-4">
                            <i data-lucide="share-2" class="w-7 h-7 text-hw-green"></i>
                            <h3 class="text-2xl font-bold">We are social</h3>
                        </div>

                        <p class="text-white/80 mb-6">
                            Let's connect on social media
                        </p>

                        <div class="flex gap-4">
                            <a href="#"
                                class="w-11 h-11 bg-white text-hw-blue rounded-full flex items-center justify-center hover:scale-105 transition">
                                <i data-lucide="facebook" class="w-5 h-5"></i>
                            </a>
                            <a href="#"
                                class="w-11 h-11 bg-white text-hw-blue rounded-full flex items-center justify-center hover:scale-105 transition">
                                <i data-lucide="instagram" class="w-5 h-5"></i>
                            </a>
                            <a href="#"
                                class="w-11 h-11 bg-white text-hw-blue rounded-full flex items-center justify-center hover:scale-105 transition">
                                <i data-lucide="twitter" class="w-5 h-5"></i>
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
