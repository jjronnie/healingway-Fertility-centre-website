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

                    <div class="relative group">
                        <a href="{{ route('our-services') }}"
                            class="nav-link {{ request()->routeIs('our-services') ? 'active' : '' }} inline-flex items-center">
                            Services
                             <svg class="w-4 h-4 transform group-hover:rotate-180 transition-transform duration-200"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7" />
                            </svg>
                        </a>

                        {{-- Dropdown --}}
                        {{-- Services Dropdown --}}
                        <div
                            class="absolute left-0 mt-2 w-56 bg-white border border-gray-200  shadow-lg opacity-0 invisible 
           group-hover:visible group-hover:opacity-100 transition-all duration-200 z-50">
                            <ul class="flex flex-col text-left">
                                @foreach ($services as $service)
                                    <li class="border-b border-gray-200 last:border-0">
                                        <a href="{{ url('services/' . $service->slug) }}"
                                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 transition-colors rounded-md">
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
                    <div class="relative group">
                        <a href="#"
                            class="nav-link  flex items-center gap-1">
                            More
                            <svg class="w-4 h-4 transform group-hover:rotate-180 transition-transform duration-200"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7" />
                            </svg>
                        </a>

                        {{-- Dropdown Menu --}}
                        <div
                            class="absolute left-0 mt-2 w-56 bg-white border border-gray-200 shadow-lg opacity-0 invisible 
               group-hover:visible group-hover:opacity-100 transition-all duration-200 z-50">
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
                                    <a href="{{ url('/latest-news') }}"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-indigo-50 hover:text-indigo-600 transition-colors">
                                        Latest News
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
                <div
                    class="flex flex-col space-y-2 p-4 text-lg bg-gradient-to-r from-hw-blue to-hw-green rounded-lg font-medium">

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

                    <a href="{{ route('our-services') }}"
                        class="px-4 py-2 rounded-lg transition-all duration-300 hover:bg-green-50 hover:text-green-700 
           {{ request()->routeIs('our-services') ? 'bg-green-600 text-white' : '' }}">
                        Services
                    </a>

                    <a href="{{ route('our-team') }}"
                        class="px-4 py-2 rounded-lg transition-all duration-300 hover:bg-green-50 hover:text-green-700 
           {{ request()->routeIs('our-team') ? 'bg-green-600 text-white' : '' }}">
                        Team
                    </a>

                    

                    <a href="{{ route('contact-us') }}"
                        class="px-4 py-2 rounded-lg transition-all duration-300 hover:bg-green-50 hover:text-green-700 
           {{ request()->routeIs('contact-us') ? 'bg-green-600 text-white' : '' }}">
                        Contact
                    </a>


                       {{-- More Dropdown --}}
                    <div class="relative group">
                        <a href="#"
                            class="nav-link {{ request()->routeIs('contact-us') ? 'active' : '' }} flex items-center gap-1">
                            More
                            <svg class="w-4 h-4 transform group-hover:rotate-180 transition-transform duration-200"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7" />
                            </svg>
                        </a>

                        {{-- Dropdown Menu --}}
                        <div
                            class="absolute left-0 mt-2 w-56 bg-white border border-gray-200 shadow-lg opacity-0 invisible 
               group-hover:visible group-hover:opacity-100 transition-all duration-200 z-50">
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
                                    <a href="{{ url('/latest-news') }}"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-indigo-50 hover:text-indigo-600 transition-colors">
                                        Latest News
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

                    <div class="flex justify-center mt-4">
                        <a href="{{ route('book-appointment') }}"
                            class="inline-block bg-hw-green text-hw-blue px-6 py-3 rounded-full font-semibold shadow-lg                hover:shadow-xl hover:bg-lime-400 transition-all duration-300 transform hover:-translate-y-0.5">
                            Book an Appointment
                        </a>
                    </div>
                </div>
            </div>


        </div>
    </nav>
