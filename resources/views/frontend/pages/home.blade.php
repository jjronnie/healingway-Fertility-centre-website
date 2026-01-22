<x-guest-layout>

    <!-- Hero Banner Section -->

    @include('frontend.layouts.banner')



    @if ($upcomingEvents->count() > 0)
        @include('frontend.layouts.events')
    @endif







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



            <div class="space-y-10">
                @foreach ($services as $service)
                    @php
                        // image on right for odd items, left for even
                        $imageRight = $loop->iteration % 2 === 1;
                    @endphp

                    <div
                        class="bg-white border border-hw-green rounded-2xl hover:shadow-xl transition-all overflow-hidden">

                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-center p-6 lg:p-10">

                            {{-- Text Section --}}
                            <div class="{{ $imageRight ? 'order-1' : 'order-1 lg:order-2' }}">
                                <!-- Icon -->
                                <div class="w-12 h-12 bg-hw-blue rounded-lg flex items-center justify-center mb-4">
                                    <i data-lucide="{{ $service->icon ?? 'info' }}" class="w-7 h-7 text-white"></i>
                                </div>

                                <!-- Heading -->
                                <h3 class="text-2xl font-bold text-gray-900 mb-3">
                                    {{ $service->name }}
                                </h3>

                                <!-- Description -->
                                <p class="text-gray-600 leading-relaxed mb-6">
                                    {{ $service->desc }}
                                </p>

                                <!-- Button -->
                                <a href="{{ route('service.show', $service->slug) }}"
                                    class="inline-flex items-center gap-2 px-6 py-3 rounded-xl bg-hw-blue text-white font-semibold hover:bg-hw-green transition">
                                    View details
                                    <i data-lucide="arrow-right" class="w-4 h-4"></i>
                                </a>
                            </div>

                            {{-- Image Section --}}
                            <div class="{{ $imageRight ? 'order-2' : 'order-2 lg:order-1' }} hidden lg:block">
                                @if ($service->photo)
                                    <img src="{{ asset('storage/' . $service->photo) }}" alt="{{ $service->name }}"
                                        class="w-full h-72 object-cover rounded-2xl" loading="lazy">
                                @else
                                    <img src="{{ asset('assets/img/1.webp') }}" alt="{{ $service->name }}"
                                        class="w-full h-72 object-cover rounded-2xl" loading="lazy">
                                @endif
                            </div>

                        </div>
                    </div>
                @endforeach
            </div>



            <!-- View All Button -->
            <div class="text-center mt-12">
                <a href="{{ route('our-services') }}"
                    class="inline-block bg-hw-green text-hw-blue px-8 py-3 rounded-lg font-semibold  hover:shadow-xl hover:bg-lime-400 transition-all duration-300">
                    Explore More Services
                </a>
            </div>

        </div>
    </section>

    <!-- About Section - Styled Like Reference -->
    <section id="about" class="py-8 md:py-12 lg:py-0 bg-gray-100 lg:h-screen lg:max-h-screen overflow-hidden">
        <div class="max-w-full mx-auto px-2 sm:px-6 lg:px-8 ">
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
                                <div class="w-12 h-12 overflow-hidden">
                                    <img src="{{ asset('assets/img/logo.png') }}" alt="HealingWay Logo"
                                        class="w-full h-full object-contain">
                                </div>
                                <span class="text-white font-semibold text-lg">HEALINGWAY</span>
                            </div>

                            <h2 class="text-4xl md:text-5xl lg:text-6xl font-bold text-white mb-6 leading-tight">
                                Your Way to<br /> <span class="text-hw-green">Parenthood</span>
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
                    class="bg-gradient-to-br hidden lg:block from-gray-800 via-gray-700 to-gray-800 rounded-3xl overflow-hidden relative h-full">
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


    <section id="img" class="py-20 px-20 hidden lg:block">
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


                        <div
                            class="bg-white p-2 rounded-2xl overflow-hidden shadow-lg hover:shadow-xl transition-shadow duration-300">
                            <div class="aspect-[4/5] overflow-hidden ">
                                <img src="{{ asset('storage/' . $staff->photo ?: 'https://placehold.co/400x400/CCCCCC/FFFFFF?text=No+Photo') }}"
                                    alt="{{ $staff->name }}"
                                    class="w-full h-full rounded-2xl object-cover hover:scale-105 transition-transform duration-300">
                            </div>
                            <div class="p-6">
                                <h3 class="text-lg font-bold text-gray-900 mb-2">
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
