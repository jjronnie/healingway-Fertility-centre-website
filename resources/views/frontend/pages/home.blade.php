<x-guest-layout>



    <!-- Hero Banner Section -->

    @include('frontend.layouts.banner')



    <!-- Services Highlights -->
    <section id="services" class="py-20 ">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Heading -->
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold bg-clip-text text-transparent bg-hw-gradient mb-4">
                    Our Specialized Services
                </h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    We provide Comprehensive fertility treatments with cutting-edge technology and personalized care
                    plans.
                </p>
            </div>

            <!-- Cards Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">

                @foreach ($services as $service)
                    <div
                        class="p-6 rounded-xl border border-green-400 bg-gradient-to-t from-white to-green-100 hover:border-hw-blue hover:-translate-y-2 hover:shadow-xl transition-all">

                        <div class="w-14 h-14 bg-healingway-blue rounded-lg flex items-center justify-center mb-5">
                            <i data-lucide="{{ $service->icon ?? 'info' }}" class="w-7 h-7 text-hw-blue"></i>
                        </div>

                        <h3 class="text-lg font-bold text-healingway-blue mb-3">{{ $service->name }}</h3>
                        <p class="text-gray-600 mb-4">{{ $service->desc }}</p>

                        <a href="{{ route('service.show', $service->slug) }}"
                            class="text-green-500 font-semibold hover:text-green-600 transition-colors">
                            Learn More <i data-lucide="arrow-right" class="w-4 h-4 inline ml-1"></i>
                        </a>
                    </div>
                @endforeach
            </div>

            <!-- View All Button -->
            <div class="text-center mt-12">
                <a href="{{ route('our-services') }}"
                    class="inline-block bg-hw-green text-hw-blue px-8 py-3 rounded-full font-semibold shadow-lg hover:shadow-xl hover:bg-lime-400 transition-all duration-300">
                    View All Services
                </a>
            </div>

        </div>
    </section>


    <!-- About Section -->
    <section id="about" class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <div>
                    <h2 class="text-4xl md:text-5xl font-bold text-blue-900 mb-6">Way to Parenthood</h2>
                    <p class="text-lg text-gray-600 mb-6">
                        For over 5 years, HealingWay Fertility Centre has been at the forefront of reproductive science,
                        combining cutting-edge technology with compassionate, personalized care.
                    </p>
                    <div class="space-y-4 mb-8">
                        <div class="flex items-center space-x-3">
                            <div class="w-6 h-6 bg-green-400 rounded-full flex items-center justify-center">
                                <i data-lucide="check" class="w-4 h-4 text-white"></i>
                            </div>
                            <span class="text-gray-700">State-of-the-art laboratory facilities</span>
                        </div>
                        <div class="flex items-center space-x-3">
                            <div class="w-6 h-6 bg-green-400 rounded-full flex items-center justify-center">
                                <i data-lucide="check" class="w-4 h-4 text-white"></i>
                            </div>
                            <span class="text-gray-700">Expert team of fertility specialists</span>
                        </div>
                        <div class="flex items-center space-x-3">
                            <div class="w-6 h-6 bg-green-400 rounded-full flex items-center justify-center">
                                <i data-lucide="check" class="w-4 h-4 text-white"></i>
                            </div>
                            <span class="text-gray-700">Personalized treatment plans</span>
                        </div>
                    </div>
                    <a href="{{ route('about-us') }}"
                        class="bg-blue-900 text-white px-8 py-3 rounded-lg hover:bg-blue-800 transition-colors inline-flex items-center">
                        Learn About Us <i data-lucide="arrow-right" class="w-4 h-4 ml-2"></i>
                    </a>
                </div>

                <!-- Mission Cards -->
                <div class="space-y-6">
                    <div
                        class="bg-white p-6 border-gray-200 rounded-2xl shadow-lg hover:border-green-400 hover:-translate-y-2 hover:shadow-xl transition-all">
                        <div class="flex items-center space-x-4 mb-4">
                            <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center">
                                <i data-lucide="target" class="w-6 h-6 text-blue-900"></i>
                            </div>
                            <h3 class="text-xl font-bold text-blue-900">Our Mission</h3>
                        </div>
                        <p class="text-gray-600">To provide world-class fertility care with compassion, helping every
                            family achieve their dream of parenthood.</p>
                    </div>

                    <div
                        class="bg-white p-6 border-gray-200 rounded-2xl shadow-lg hover:border-green-400 hover:-translate-y-2 hover:shadow-xl transition-all">
                        <div class="flex items-center space-x-4 mb-4">
                            <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center">
                                <i data-lucide="eye" class="w-6 h-6 text-green-600"></i>
                            </div>
                            <h3 class="text-xl font-bold text-blue-900">Our Vision</h3>
                        </div>
                        <p class="text-gray-600">To be the leading fertility center, setting new standards in
                            reproductive medicine and patient care.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="team" class="py-20 ">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-4xl md:text-5xl font-bold text-blue-900 mb-6">Meet Our Expert Team</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">Board-certified specialists dedicated to serving you
                    better.</p>
            </div>

            <!-- Doctor Cards Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">

                @foreach ($doctors as $doctor)

                <!-- Doctor Card 1 -->
                <a href="{{ route('doctors.show', $doctor->slug) }}">
                <div
                    class="flex flex-col bg-white shadow-lg overflow-hidden transform hover:scale-105 transition-transform duration-300 ease-in-out h-full">
                    <div class="relative w-full h-60 overflow-hidden ">
                        <img src="{{ asset($doctor->photo ?: 'https://placehold.co/600x400/CCCCCC/FFFFFF?text=No+Photo') }}"
                                 alt="{{ $doctor->name }}" 
                            class="object-cover w-full h-full">
                    </div>
                    <div class="p-6 flex flex-col justify-between flex-grow">
                        <div>
                            <p class="text-md text-gray-800 text-center mb-4">{{ $doctor->position }}</p>
                            <h3 class="text-xl font-bold text-center text-gray-800 mb-1">{{ $doctor->name }}</h3>
                            
                        </div>
                    </div>
                </div>
                </a>
                 @endforeach

            </div>

            <div class="text-center mt-12">
                <a href="{{ route('our-team') }}"
                    class="bg-green-600 text-white px-8 py-3 rounded-lg font-medium hover:bg-green-700 transition-colors inline-flex items-center">
                    View All Team
                </a>
            </div>
        </div>
    </section>


    <!-- CTA Section -->
    <section class="py-16 bg-gradient-to-r from-hw-green to-green-400">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl md:text-4xl font-bold text-hw-blue mb-6">
                Ready to Start Your Family Journey?
            </h2>
            <p class="text-xl text-hw-blue mb-8 max-w-2xl mx-auto">
                Our fertility specialists are here to guide you every step of the way.
                Schedule your consultation today and take the first step towards parenthood.
            </p>
            <a href="{{ route('book-appointment') }}"
                class="bg-hw-blue hover:bg-blue-800 text-white px-8 py-3 text-lg rounded-lg font-semibold transition-all hover-lift">
                Book An Appointment
            </a>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold text-blue-900 mb-4">Get in Touch</h2>
                <p class="text-xl text-gray-600">Contact us today.</p>
            </div>

            <div class="grid lg:grid-cols-2 gap-12">
                <!-- Contact Form -->
                <div class="bg-white p-8 rounded-2xl shadow-lg">
                    <h3 class="text-2xl font-bold text-blue-900 mb-6">Send us a Message</h3>
                    <form class="space-y-6">
                        <div class="grid md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">First Name</label>
                                <input type="text"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-400 focus:border-green-400">
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Last Name</label>
                                <input type="text"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-400 focus:border-green-400">
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Email</label>
                            <input type="email"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-400 focus:border-green-400">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Message</label>
                            <textarea rows="4"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-400 focus:border-green-400"></textarea>
                        </div>
                        <button type="submit"
                            class="bg-hw-blue hover:bg-blue-800 text-white px-8 py-3 text-lg rounded-lg font-semibold transition-all hover-lift">
                            Send Message
                        </button>
                    </form>
                </div>

                <!-- Contact Information -->
                <div class="space-y-8">
                    <div class="bg-white p-6 rounded-2xl shadow-lg">
                        <div class="flex items-center space-x-4 mb-4">
                            <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center">
                                <i data-lucide="map-pin" class="w-6 h-6 text-blue-900"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-blue-900">Address</h4>
                                <p class="text-gray-600">Plot 6A2-7B2 Luthuli 5th Close, <br>Bugolobi, Kampala Uganda.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white p-6 rounded-2xl shadow-lg">
                        <div class="flex items-center space-x-4 mb-4">
                            <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center">
                                <i data-lucide="phone" class="w-6 h-6 text-green-600"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-blue-900">Phone</h4>
                                <p class="text-gray-600">+256 700 521155</p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white p-6 rounded-2xl shadow-lg">
                        <div class="flex items-center space-x-4 mb-4">
                            <div class="w-12 h-12 bg-purple-100 rounded-xl flex items-center justify-center">
                                <i data-lucide="mail" class="w-6 h-6 text-purple-600"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-blue-900">Email</h4>
                                <p class="text-gray-600">info@healingwayfertilitycentre.com</p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white p-6 rounded-2xl shadow-lg">
                        <div class="flex items-center space-x-4 mb-4">
                            <div class="w-12 h-12 bg-orange-100 rounded-xl flex items-center justify-center">
                                <i data-lucide="clock" class="w-6 h-6 text-orange-600"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-blue-900">Hours</h4>
                                <p class="text-gray-600">Always Open<br>24/7</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</x-guest-layout>
