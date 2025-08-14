    <!-- Navigation -->
    <nav x-data="{ open: false, scrolled: false }" @scroll.window="scrolled = (window.pageYOffset > 10)"
        :class="{ 'bg-gradient-to-r from-hw-blue to-hw-green ': scrolled, 'bg-gradient-to-r from-hw-blue to-hw-green': !scrolled }"
        class="fixed top-0 left-0 right-0 z-50 transition-all duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center py-4">

                <!-- Logo -->
                <a href="index.html" class="flex items-center space-x-3 group" x-cloak>
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
                <div class="hidden lg:flex items-center text-center space-x-8 text-lg font-medium " x-cloak>
                    <a href="index.html" class="nav-link"
                        :class="{ 'active': window.location.pathname.endsWith('index.html') }">Home</a>
                    <a href="about.html" class="nav-link"
                        :class="{ 'active': window.location.pathname.endsWith('about.html') }">About</a>
                    <a href="services.html" class="nav-link"
                        :class="{ 'active': window.location.pathname.endsWith('services.html') }">Services</a>
                    <a href="team.html" class="nav-link"
                        :class="{ 'active': window.location.pathname.endsWith('team.html') }">Team</a>
                    <a href="contact.html" class="nav-link"
                        :class="{ 'active': window.location.pathname.endsWith('contact.html') }">Resources</a>
                    <a href="contact.html" class="nav-link"
                        :class="{ 'active': window.location.pathname.endsWith('contact.html') }">Contact</a>
                    <a href="login.html"
                        class="bg-hw-blue text-sm font-bold text-white px-4 py-2 rounded-lg hover:bg-white hover:text-hw-blue transition-colors">Book
                        Appointment</a>
                </div>

                <!-- Mobile Menu Button -->
                <button @click="open = !open" class="lg:hidden p-2   duration-300" x-cloak>
                    <i data-lucide="menu" class="w-8 h-8 text-white transition-transform duration-300 hover:scale-110">
                    </i>
                </button>

            </div>

            <!-- Mobile Navigation -->
            <div x-show="open" x-transition x-cloak class="md:hidden pb-4 mt-3  text-white text-bold">
                <div
                    class="flex flex-col space-y-2 p-4 text-lg bg-gradient-to-r from-hw-blue to-hw-green rounded-lg font-medium">
                    <a href="index.html"
                        class="px-4 py-2 rounded-lg transition-all duration-300 hover:bg-green-50 hover:text-green-700"
                        :class="{ 'bg-hw-green text-hw-blue': window.location.pathname.endsWith('index.html') }">
                        Home
                    </a>
                    <a href="about.html"
                        class="px-4 py-2 rounded-lg transition-all duration-300 hover:bg-green-50 hover:text-green-700"
                        :class="{ 'bg-green-600 text-white': window.location.pathname.endsWith('about.html') }">
                        About
                    </a>
                    <a href="services.html"
                        class="px-4 py-2 rounded-lg transition-all duration-300 hover:bg-green-50 hover:text-green-700"
                        :class="{ 'bg-green-600 text-white': window.location.pathname.endsWith('services.html') }">
                        Services
                    </a>
                    <a href="team.html"
                        class="px-4 py-2 rounded-lg transition-all duration-300 hover:bg-green-50 hover:text-green-700"
                        :class="{ 'bg-green-600 text-white': window.location.pathname.endsWith('team.html') }">
                        Team
                    </a>
                    <a href="contact.html"
                        class="px-4 py-2 rounded-lg transition-all duration-300 hover:bg-green-50 hover:text-green-700"
                        :class="{ 'bg-green-600 text-white': window.location.pathname.endsWith('contact.html') }">
                        Resources
                    </a>

                    <a href="contact.html"
                        class="px-4 py-2 rounded-lg transition-all duration-300 hover:bg-green-50 hover:text-green-700"
                        :class="{ 'bg-green-600 text-white': window.location.pathname.endsWith('contact.html') }">
                        Contact
                    </a>
                    <div class="flex justify-center mt-4">
                        <a href="login.html"
                            class="inline-block bg-hw-green text-hw-blue px-6 py-3 rounded-full font-semibold shadow-lg hover:shadow-xl hover:bg-lime-400 transition-all duration-300 transform hover:-translate-y-0.5">
                            Book an Appointment
                        </a>
                    </div>

                </div>
            </div>

        </div>
    </nav>


<section class="relative banner-image py-24 mt-[80px] overflow-hidden" 
    style="background-image: url('https://images.unsplash.com/photo-1581091226825-a6a2a5aee158?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80');">

    <!-- Blur/Dark Overlay -->
    <div class="absolute inset-0 bg-black/40 backdrop-blur-sm"></div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <h1 class="text-4xl md:text-6xl font-bold mb-4 text-white">
                {{ Str::title(str_replace('-', ' ', Route::currentRouteName())) }}
            </h1>
        </div>
    </div>
</section>

