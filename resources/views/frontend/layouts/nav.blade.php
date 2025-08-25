    <!-- Navigation -->
    <nav x-data="{ open: false, scrolled: false }" @scroll.window="scrolled = (window.pageYOffset > 10)"
        :class="{
            @if(request()->routeIs('home'))
            'bg-gradient-to-r from-hw-blue to-hw-green': scrolled,
            'bg-transparent': !scrolled
            @else
                'bg-gradient-to-r from-hw-blue to-hw-green': true
            @endif
        }"
        class="fixed top-0 left-0 right-0 z-50 transition-all duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center py-4">
                <!-- Logo -->
                <a href="{{ route('home') }}" class="flex items-center space-x-3 group" x-cloak>
                    <div class="w-12 h-12 flex items-center justify-center overflow-hidden transition-all duration-300">
                        <img src="{{ asset('assets/img/logo.png') }}" alt="HealingWay Logo"
                            class="w-full h-full object-contain">
                    </div>

                    <div>
                        <div class="text-2xl mb-0 font-bold transition-colors text-white ">
                            <span class="text-hw-green">Healing</span>Way
                        </div>
                        <div class="text-1xl mt-0 font-bold transition-colors text-hw-green">
                            Fertility Centre
                        </div>
                    </div>
                </a>



                <!-- Desktop Navigation -->
                <div class="hidden lg:flex items-center text-center space-x-8 text-lg font-medium" x-cloak>
                    <a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">
                        Home
                    </a>

                    <a href="{{ route('about-us') }}"
                        class="nav-link {{ request()->routeIs('about-us') ? 'active' : '' }}">
                        About
                    </a>

                    @php
                        $services = \App\Models\Service::orderBy('name')->get();
                    @endphp

                    {{-- Services Dropdown --}}
                    <div x-data="{ open: false }" class="relative">
                        <button @click="open = !open"
                            class="nav-link inline-flex items-center gap-1 focus:outline-none {{ request()->routeIs('our-services') ? 'active' : '' }}">
                            Services
                            <i data-lucide="chevron-down" :class="{ 'rotate-180': open }"
                                class="w-4 h-4 transition-transform duration-200"></i>
                        </button>

                        {{-- Dropdown --}}
                        <div x-show="open" x-transition:enter="transition ease-out duration-200"
                            x-transition:enter-start="opacity-0 translate-y-2"
                            x-transition:enter-end="opacity-100 translate-y-0"
                            x-transition:leave="transition ease-in duration-150"
                            x-transition:leave-start="opacity-100 translate-y-0"
                            x-transition:leave-end="opacity-0 translate-y-2" @click.outside="open = false"
                            class="absolute left-0 mt-2 w-56 bg-white border border-gray-200 shadow-lg rounded-md z-50">
                            <ul class="flex flex-col text-left">

                                <a href="{{ route('our-services') }}"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-indigo-50 hover:text-indigo-600 transition-colors rounded-md">
                                    All Services
                                </a>
                                @foreach ($services as $service)
                                    <li class="border-b border-gray-200 last:border-0">
                                        <a href="{{ url('services/' . $service->slug) }}"
                                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-indigo-50 hover:text-indigo-600 transition-colors rounded-md">
                                            {{ $service->name }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>



                    <a href="{{ route('our-team') }}"
                        class="nav-link {{ request()->routeIs('our-team') ? 'active' : '' }}">
                        Team
                    </a>



                    <a href="{{ route('contact-us') }}"
                        class="nav-link {{ request()->routeIs('contact-us') ? 'active' : '' }}">
                        Contact
                    </a>
                    {{-- More Dropdown --}}
                    <div x-data="{ open: false }" class="relative">
                        <button @click="open = !open" class="nav-link flex items-center gap-1 focus:outline-none">
                            More
                            <i data-lucide="chevron-down" :class="{ 'rotate-180': open }"
                                class="w-4 h-4 transition-transform duration-200"></i>
                        </button>

                        {{-- Dropdown Menu --}}
                        <div x-show="open" x-transition:enter="transition ease-out duration-200"
                            x-transition:enter-start="opacity-0 translate-y-2"
                            x-transition:enter-end="opacity-100 translate-y-0"
                            x-transition:leave="transition ease-in duration-150"
                            x-transition:leave-start="opacity-100 translate-y-0"
                            x-transition:leave-end="opacity-0 translate-y-2" @click.outside="open = false"
                            class="absolute left-0 mt-2 w-56 bg-white border border-gray-200 shadow-lg rounded-md z-50">
                            <ul class="flex flex-col text-left">
                                <li class="border-b border-gray-200 last:border-0">
                                    <a href="{{ url('/resources') }}"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-indigo-50 hover:text-indigo-600 transition-colors">
                                        Resources
                                    </a>
                                </li>
                                <li class="border-b border-gray-200 last:border-0">
                                    <a href="{{ url('/events') }}"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-indigo-50 hover:text-indigo-600 transition-colors">
                                        Events
                                    </a>
                                </li>
                                <li class="border-b border-gray-200 last:border-0">
                                    <a href="{{ url('/testimonials') }}"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-indigo-50 hover:text-indigo-600 transition-colors">
                                        Testimonials
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('/facility-tour') }}"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-indigo-50 hover:text-indigo-600 transition-colors">
                                        Facility Tour
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>



                    <a href="{{ route('book-appointment') }}"
                        class="bg-hw-blue text-sm font-bold text-white px-4 py-2 rounded-lg hover:bg-white hover:text-hw-blue transition-colors">
                        Book Appointment
                    </a>
                </div>


                <!-- Mobile Menu Button -->
                <button @click="open = !open" class="lg:hidden p-2   duration-300" x-cloak>
                    <i data-lucide="menu" class="w-8 h-8 text-white transition-transform duration-300 hover:scale-110">
                    </i>
                </button>

            </div>
            <!-- Mobile Navigation -->
            <div x-show="open" x-transition x-cloak class="md:hidden pb-4 mt-3 text-white font-bold">
                <div class="flex flex-col space-y-2 p-4 text-lg bg-gradient-to-r from-hw-blue to-hw-green rounded-lg font-medium"
                    x-data="{ openSection: null }">

                    <a href="{{ route('home') }}"
                        class="px-4 py-2 rounded-lg transition-all duration-300 hover:bg-green-50 hover:text-green-700 
           {{ request()->routeIs('home') ? 'bg-hw-green text-hw-blue' : '' }}">
                        Home
                    </a>

                    <a href="{{ route('about-us') }}"
                        class="px-4 py-2 rounded-lg transition-all duration-300 hover:bg-green-50 hover:text-green-700 
           {{ request()->routeIs('about-us') ? 'bg-green-600 text-white' : '' }}">
                        About
                    </a>

                    {{-- Services collapsible --}}
                    <div class="flex flex-col">
                        <button @click="openSection = openSection === 'services' ? null : 'services'"
                            class="px-4 py-2 rounded-lg text-left transition-all duration-300 hover:bg-green-50 hover:text-green-700 flex items-center justify-between">
                            <span>Services</span>
                            <i data-lucide="chevron-down" :class="{ 'rotate-180': openSection === 'services' }"
                                class="w-4 h-4 transition-transform duration-300"></i>
                        </button>
                        <div x-show="openSection === 'services'" x-transition:enter="transition ease-out duration-300"
                            x-transition:enter-start="opacity-0 -translate-y-2"
                            x-transition:enter-end="opacity-100 translate-y-0"
                            x-transition:leave="transition ease-in duration-200"
                            x-transition:leave-start="opacity-100 translate-y-0"
                            x-transition:leave-end="opacity-0 -translate-y-2"
                            class="ml-6 flex flex-col space-y-1 mt-1 overflow-hidden">
                            @foreach ($services as $service)
                                <a href="{{ url('services/' . $service->slug) }}"
                                    class="px-3 py-1 rounded-md transition-all duration-200 hover:bg-green-50 hover:text-green-700 text-white/90">
                                    {{ $service->name }}
                                </a>
                            @endforeach
                        </div>
                    </div>

                    <a href="{{ route('our-team') }}"
                        class="px-4 py-2 rounded-lg transition-all duration-300 hover:bg-green-50 hover:text-green-700 
           {{ request()->routeIs('our-team') ? 'bg-green-600 text-white' : '' }}">
                        Team
                    </a>

                    {{-- More collapsible --}}
                    <div class="flex flex-col">
                        <button @click="openSection = openSection === 'more' ? null : 'more'"
                            class="px-4 py-2 rounded-lg text-left transition-all duration-300 hover:bg-green-50 hover:text-green-700 flex items-center justify-between">
                            <span>More</span>
                            <i data-lucide="chevron-down" :class="{ 'rotate-180': openSection === 'more' }"
                                class="w-4 h-4 transition-transform duration-300"></i>
                        </button>
                        <div x-show="openSection === 'more'" x-transition:enter="transition ease-out duration-300"
                            x-transition:enter-start="opacity-0 -translate-y-2"
                            x-transition:enter-end="opacity-100 translate-y-0"
                            x-transition:leave="transition ease-in duration-200"
                            x-transition:leave-start="opacity-100 translate-y-0"
                            x-transition:leave-end="opacity-0 -translate-y-2"
                            class="ml-6 flex flex-col space-y-1 mt-1 overflow-hidden">
                            <a href="{{ url('/resources') }}"
                                class="px-3 py-1 rounded-md transition-all duration-200 hover:bg-green-50 hover:text-green-700 text-white/90">
                                Resources
                            </a>
                            <a href="{{ url('/events') }}"
                                class="px-3 py-1 rounded-md transition-all duration-200 hover:bg-green-50 hover:text-green-700 text-white/90">
                                Events
                            </a>
                            <a href="{{ url('/testimonials') }}"
                                class="px-3 py-1 rounded-md transition-all duration-200 hover:bg-green-50 hover:text-green-700 text-white/90">
                                Testimonials
                            </a>
                            <a href="{{ url('/facility-tour') }}"
                                class="px-3 py-1 rounded-md transition-all duration-200 hover:bg-green-50 hover:text-green-700 text-white/90">
                                Facility Tour
                            </a>
                        </div>
                    </div>

                    <a href="{{ route('contact-us') }}"
                        class="px-4 py-2 rounded-lg transition-all duration-300 hover:bg-green-50 hover:text-green-700 
           {{ request()->routeIs('contact-us') ? 'bg-green-600 text-white' : '' }}">
                        Contact
                    </a>

                    <div class="flex justify-center mt-4">
                        <a href="{{ route('book-appointment') }}"
                            class="inline-block bg-hw-green text-hw-blue px-6 py-3 rounded-full font-semibold shadow-lg hover:shadow-xl hover:bg-lime-400 transition-all duration-300 transform hover:-translate-y-0.5">
                            Book an Appointment
                        </a>
                    </div>
                </div>
            </div>



        </div>
    </nav>
