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
                        <img src="assets/img/logo.png" alt="HealingWay Logo" class="w-full h-full object-contain">
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

                    <a href="{{ route('our-services') }}"
                        class="nav-link {{ request()->routeIs('our-services') ? 'active' : '' }}">
                        Services
                    </a>

                    <a href="{{ route('our-team') }}"
                        class="nav-link {{ request()->routeIs('our-team') ? 'active' : '' }}">
                        Team
                    </a>

                    <a href="{{ route('resources') }}"
                        class="nav-link {{ request()->routeIs('resources') ? 'active' : '' }}">
                        Resources
                    </a>

                    <a href="{{ route('contact-us') }}"
                        class="nav-link {{ request()->routeIs('contact-us') ? 'active' : '' }}">
                        Contact
                    </a>

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

                    <a href="{{ route('resources') }}"
                        class="px-4 py-2 rounded-lg transition-all duration-300 hover:bg-green-50 hover:text-green-700 
           {{ request()->routeIs('resources') ? 'bg-green-600 text-white' : '' }}">
                        Resources
                    </a>

                    <a href="{{ route('contact-us') }}"
                        class="px-4 py-2 rounded-lg transition-all duration-300 hover:bg-green-50 hover:text-green-700 
           {{ request()->routeIs('contact-us') ? 'bg-green-600 text-white' : '' }}">
                        Contact
                    </a>

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
