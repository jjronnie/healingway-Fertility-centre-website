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
                   At HealingWay Fertility Centre, we provide comprehensive fertility treatments with cutting-edge technology and personalized care
                    plans tailored to meet your needs.
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
                    Explore More Services
                </a>
            </div>

        </div>
    </section>


    <!-- About Section -->
    <section id="about" class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <div>
                    <h2 class="text-4xl md:text-4xl font-bold text-blue-900 mb-6">Way to Parenthood</h2>
                    <p class="text-lg text-gray-600 mb-6">
                        Over the years, HealingWay Fertility Centre has been at the forefront of reproductive science,
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
                        Learn More About Us <i data-lucide="arrow-right" class="w-4 h-4 ml-2"></i>
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
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">Meet our team of  specialists dedicated to serving you
                    better.</p>
            </div>

            <!-- staff Cards Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">

                @foreach ($staff as $staff)

                <!-- staff Card 1 -->
                <a href="{{ route('staff.show', $staff->slug) }}">
                <div
                    class="flex flex-col bg-white shadow-lg overflow-hidden transform hover:scale-105 transition-transform duration-300 ease-in-out h-full">
                    <div class="relative w-full h-60 overflow-hidden ">
                        <img src="{{ asset($staff->photo ?: 'https://placehold.co/600x400/CCCCCC/FFFFFF?text=No+Photo') }}"
                                 alt="{{ $staff->name }}" 
                            class="object-cover w-full h-full">
                    </div>
                    <div class="p-6 flex flex-col justify-between flex-grow">
                        <div>
                            <p class="text-md text-gray-800 text-center mb-4">{{ $staff->position }}</p>
                            <h3 class="text-xl font-bold text-center text-gray-800 mb-1">{{ $staff->name }}</h3>                            
                        </div>
                    </div>
                </div>
                </a>
                 @endforeach

            </div>

            <div class="text-center mt-12">
                <a href="{{ route('our-team') }}"
                    class="bg-hw-green text-white px-8 py-3 rounded-lg font-medium hover:bg-green-700 transition-colors inline-flex items-center">
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
                Schedule An Appointment
            </a>
        </div>
    </section>

  

</x-guest-layout>
