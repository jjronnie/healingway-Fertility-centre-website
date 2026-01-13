<x-guest-layout>

    <!-- Hero Banner Section -->

    @include('frontend.layouts.banner')








    <!-- Services Highlights -->
    <section id="services" class="py-20 ">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Heading -->
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold bg-clip-text text-hw-blue mb-4">
                    Our Specialized Services
                </h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    At HealingWay Fertility Centre, we provide comprehensive fertility treatments with cutting-edge
                    technology and personalized care
                    plans tailored to meet your needs.
                </p>
            </div>



            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">



                @foreach ($services as $service)
                    <a href="{{ route('service.show', $service->slug) }}">

                        <div
                            class="bg-white border border-hw-green hover:bg-gradient-to-t from-white to-green-100 hover:border-hw-blue  hover:-translate-y-2 hover:shadow-xl transition-all rounded-3xl shadow-lg overflow-hidden ">

                            <!-- Top content -->
                            <div class="p-6">

                                <!-- Icon -->
                                <div
                                    class="w-12 h-12 bg-hw-blue  rounded-lg bg-primary-100 flex items-center justify-center mb-4">

                                    <i data-lucide="{{ $service->icon ?? 'info' }}" class="w-7 h-7 text-white "></i>
                                </div>

                                <!-- Heading -->
                                <h3 class="text-2xl font-bold text-gray-900 mb-3 leading-tight">
                                    {{ $service->name }}
                                </h3>

                                <!-- Description -->
                                <p class="text-gray-600 leading-relaxed">
                                    {{ $service->desc }}
                                </p>
                            </div>

                            <!-- Image -->
                            <div class="px-6 pb-6">
                                @if ($service->photo)
                                    <img src="{{ asset('storage/' . $service->photo) }}" alt="{{ $service->name }}"
                                        class="w-full h-56 object-cover rounded-2xl" loading="lazy">
                                @else
                                    <img src="{{ asset('assets/img/1.webp') }}" alt="{{ $service->name }}"
                                        class="w-full h-56 object-cover rounded-2xl" loading="lazy">
                                @endif


                            </div>

                        </div>
                    </a>
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

    <!-- About Section - Styled Like Reference -->
    <section id="about" class="py-8 md:py-12 lg:py-0 bg-gray-100 lg:h-screen lg:max-h-screen overflow-hidden">
        <div class="max-w-full mx-auto px-4 sm:px-6 lg:px-8 ">
            <div class="grid p-6 gap-6  h-full lg:grid-cols-[45%_55%]">

                <!-- Left Card - Content (1/3) -->
                <div
                    class="bg-hw-blue rounded-3xl p-8 md:p-12 lg:p-16 flex flex-col justify-between h-full relative overflow-hidden">
                    <!-- Decorative Circle -->
                    <div
                        class="absolute bottom-0 right-0 w-64 h-64 bg-blue-800 rounded-full opacity-30 translate-x-20 translate-y-20">
                    </div>

                    <div class="relative z-10">
                        <!-- Logo/Title Area -->
                        <div class="mb-8 md:mb-12">
                            <div class="flex items-center space-x-3 mb-6">
                                <div
                                    class="w-12 h-12 bg-white/10 rounded-full flex items-center justify-center backdrop-blur-sm">
                                    <svg class="w-6 h-6 text-green-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                    </svg>
                                </div>
                                <span class="text-white font-semibold text-lg">HEALINGWAY</span>
                            </div>

                            <h2 class="text-4xl md:text-5xl lg:text-6xl font-bold text-white mb-6 leading-tight">
                                Your Way to<br />Parenthood
                            </h2>

                            <p class="text-blue-100 text-lg md:text-xl leading-relaxed">
                                Empower your family-building journey with cutting-edge technology and compassionate
                                care.
                            </p>
                        </div>
                    </div>

                    <!-- Bottom Text -->
                    <div class="relative z-10 mt-auto">
                        <p class="text-blue-100 text-base md:text-lg leading-relaxed">
                            Over the years, HealingWay Fertility Centre has been at the forefront of reproductive
                            science,
                            combining cutting-edge technology with compassionate, personalized care.
                        </p>
                    </div>
                </div>

                <!-- Right Card - Image with Stats (2/3) -->

                <div
                    class="bg-gradient-to-br from-gray-800 via-gray-700 to-gray-800 rounded-3xl overflow-hidden relative h-full">
                    <!-- Background Image -->
                    <img src="{{ asset('assets/img/1.webp') }}" alt="Fertility Care Team"
                        class="absolute inset-0 w-full h-full object-cover opacity-60">

                    <!-- Overlay Gradient -->
                    <div class="absolute inset-0 bg-gradient-to-b from-transparent via-gray-900/50 to-gray-900/90">
                    </div>

                    <!-- Content -->
                    <div class="relative z-10 h-full flex flex-col justify-between p-8 md:p-12">

                        <!-- Stats Row -->
                        <div class="grid grid-cols-3 gap-4 md:gap-6">
                            <!-- Stat 1 -->
                            <div>
                                <div class="text-4xl md:text-5xl lg:text-6xl font-bold text-white mb-2">
                                    5+
                                </div>
                                <p class="text-gray-300 text-sm md:text-base leading-snug">
                                    Years of excellence in reproductive care
                                </p>
                            </div>

                            <!-- Stat 2 -->
                            <div>
                                <div class="text-4xl md:text-5xl lg:text-6xl font-bold text-white mb-2">
                                    100+
                                </div>
                                <p class="text-gray-300 text-sm md:text-base leading-snug">
                                    Families helped achieve parenthood
                                </p>
                            </div>

                            <!-- Stat 3 -->
                            <div>
                                <div class="text-4xl md:text-5xl lg:text-6xl font-bold text-white mb-2">
                                    85%
                                </div>
                                <p class="text-gray-300 text-sm md:text-base leading-snug">
                                    Success rate with advanced fertility treatments
                                </p>
                            </div>
                        </div>

                        <!-- CTA Button -->
                        <div class="mt-auto">
                            <a href="{{ route('about-us') }}"
                                class="inline-flex items-center bg-white text-hw-blue px-8 py-4 rounded-full font-semibold text-base md:text-lg hover:bg-blue-50 transition-all duration-300 shadow-lg hover:shadow-xl group">
                                <span
                                    class="w-10 h-10 bg-hw-blue rounded-full flex items-center justify-center mr-3 group-hover:bg-blue-800 transition-colors">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17 8l4 4m0 0l-4 4m4-4H3" />
                                    </svg>
                                </span>
                                LEARN MORE
                            </a>
                        </div>
                    </div>
                </div>

            </div>
    </section>


    <section id="services" class="py-20 px-20">
        <div class="relative overflow-hidden  h-[500px] lg:h-[600px]">
            <img src="{{ asset('assets/img/3.webp') }}" alt="Fertility Care Team"
                class="w-full h-full rounded-3xl object-cover">
        </div>
    </section>




    <section id="team" class="py-20 ">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-4xl md:text-5xl font-bold text-hw-blue mb-6">Meet Our Expert Team</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">Meet our team of specialists dedicated to serving
                    you
                    better.</p>
            </div>

            <!-- staff Cards Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">

                @foreach ($staff as $staff)
                    <!-- staff Card 1 -->
                    <a href="{{ route('staff.show', $staff->slug) }}">


                        <!-- Card 1 -->
                        <div
                            class="bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-xl transition-shadow duration-300">
                            <div class="aspect-[4/5] overflow-hidden bg-gray-200">
                                <img src="{{ asset($staff->photo ?: 'https://placehold.co/400x400/CCCCCC/FFFFFF?text=No+Photo') }}"
                                    alt="{{ $staff->name }}"
                                    class="w-full h-full object-cover hover:scale-105 transition-transform duration-300">
                            </div>
                            <div class="p-6">
                                <h3 class="text-2xl font-bold text-gray-900 mb-2">
                                    {{ $staff->name }}
                                </h3>
                                <p class="text-base text-gray-600">
                                    {{ $staff->position }}
                                </p>
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






</x-guest-layout>
