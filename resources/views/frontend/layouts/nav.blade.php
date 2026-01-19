<!-- Navigation -->
<nav x-data="{ open: false, scrolled: false }" @scroll.window="scrolled = window.scrollY > 10"
    :class="scrolled
        ?
        'bg-hw-blue shadow-lg' :
        'bg-transparent'"
    class="absolute top-0 left-0 right-0 z-50 transition-all duration-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center py-4">

            <!-- Logo -->
            <a href="{{ route('home') }}" class="flex items-center space-x-3">
                <div class="w-12 h-12 overflow-hidden">
                    <img src="{{ asset('assets/img/logo.png') }}" alt="HealingWay Logo"
                        class="w-full h-full object-contain">
                </div>

                <div class="text-white leading-tight">
                    <div class="text-2xl font-bold">
                        <span class="text-hw-green">Healing</span>Way
                    </div>
                    <div class="text-sm font-semibold text-hw-green">
                        Fertility Centre
                    </div>
                </div>
            </a>

            @php
                $services = \App\Models\Service::orderBy('name')->get();
            @endphp

            <!-- Desktop Nav -->
            <div class="hidden lg:flex items-center space-x-8 text-lg font-medium text-white">

                <a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">Home</a>
                <a href="{{ route('about-us') }}"
                    class="nav-link {{ request()->routeIs('about-us') ? 'active' : '' }}">About</a>

                <!-- Services -->
                <div x-data="{ open: false }" class="relative">
                    <button @click="open = !open" class="nav-link inline-flex items-center gap-1">
                        Services
                        <i data-lucide="chevron-down" :class="{ 'rotate-180': open }"
                            class="w-4 h-4 transition-transform"></i>
                    </button>

                    <div x-show="open" x-transition @click.outside="open = false"
                        class="absolute left-0 mt-2 w-72 bg-white border border-gray-200 shadow-lg rounded-md z-50">
                        <a href="{{ route('our-services') }}"
                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-indigo-50">
                            All Services
                        </a>

                        @foreach ($services as $service)
                            <a href="{{ url('services/' . $service->slug) }}"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-indigo-50">
                                {{ $service->name }}
                            </a>
                        @endforeach
                    </div>
                </div>

                <a href="{{ route('events.list') }}"
                    class="nav-link {{ request()->routeIs('events.list') ? 'active' : '' }}">Events</a>
                <a href="{{ route('contact-us') }}"
                    class="nav-link {{ request()->routeIs('contact-us') ? 'active' : '' }}">Contact</a>

                <!-- More -->
                <div x-data="{ open: false }" class="relative">
                    <button @click="open = !open" class="nav-link inline-flex items-center gap-1">
                        More
                        <i data-lucide="chevron-down" :class="{ 'rotate-180': open }"
                            class="w-4 h-4 transition-transform"></i>
                    </button>

                    <div x-show="open" x-transition @click.outside="open = false"
                        class="absolute left-0 mt-2 w-56 bg-white border border-gray-200 shadow-lg rounded-md z-50">
                        <a href="/resources"
                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-indigo-50">Resources</a>
                        <a href="/events" class="block px-4 py-2 text-sm text-gray-700 hover:bg-indigo-50">Events</a>
                        <a href="/testimonials"
                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-indigo-50">Testimonials</a>
                        <a href="/facility-tour"
                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-indigo-50">Facility Tour</a>
                    </div>
                </div>

                <a href="{{ route('book-appointment') }}"
                    class="bg-hw-blue text-sm font-bold text-white px-4 py-2 rounded-lg hover:bg-white hover:text-hw-blue transition-colors">
                    Book Appointment
                </a>
            </div>

            <!-- Mobile Button -->
            <button @click="open = !open" class="lg:hidden">
                <i data-lucide="menu" class="w-8 h-8 text-white"></i>
            </button>
        </div>

        <!-- Mobile Menu -->
        <div x-show="open" x-transition class="lg:hidden pb-4">
            <div class="flex flex-col space-y-2 p-4 text-white font-medium bg-hw-blue rounded-lg">
                <a href="{{ route('home') }}" class="mobile-link">Home</a>
                <a href="{{ route('about-us') }}" class="mobile-link">About</a>
                <a href="{{ route('our-services') }}" class="mobile-link">Services</a>
                <a href="{{ route('our-team') }}" class="mobile-link">Team</a>
                <a href="{{ route('contact-us') }}" class="mobile-link">Contact</a>

                <a href="{{ route('book-appointment') }}"
                    class="mt-4 text-center bg-hw-green text-hw-blue px-6 py-3 rounded-full font-semibold">
                    Book an Appointment
                </a>
            </div>
        </div>
    </div>
</nav>
