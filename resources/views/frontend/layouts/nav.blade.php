@php
    // 1. Define Menu Structure Data here to reuse in Desktop and Mobile
    $services = \App\Models\Service::orderBy('name')->get();

    $menuItems = [
        [
            'label' => 'Home',
            'route' => 'home',
            'type' => 'link',
        ],
        [
            'label' => 'About',
            'route' => 'about-us',
            'type' => 'link',
        ],
        [
            'label' => 'Services',
            'id' => 'services', 
            'type' => 'dropdown',
            'main_link' => route('our-services'),
            'children' => $services->map(fn($s) => ['label' => $s->name, 'url' => url('services/' . $s->slug)]),
        ],
        [
            'label' => 'Events',
            'route' => 'events.list',
            'type' => 'link',
        ],
        [
            'label' => 'Contact',
            'route' => 'contact-us',
            'type' => 'link',
        ],
        [
            'label' => 'More',
            'id' => 'more',
            'type' => 'dropdown',
            'children' => [
                ['label' => 'Resources', 'url' => '/resources'],
                ['label' => 'Testimonials', 'url' => '/testimonials'],
                ['label' => 'Facility Tour', 'url' => '/facility-tour'],
            ],
        ],
    ];
@endphp

<nav x-cloak x-data="{
    mobileOpen: false,
    scrolled: false,
    mobileActive: null, // Controls which mobile accordion is open
    toggleMobileItem(id) {
        // If clicking the already open item, close it. Otherwise, open the new one.
        this.mobileActive = this.mobileActive === id ? null : id;
    }
}" @scroll.window="scrolled = window.scrollY > 10"
    :class="scrolled ? 'bg-hw-blue shadow-lg' : 'bg-transparent'"
    class="fixed top-0 left-0 right-0 z-50 transition-all duration-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center py-4">

            <a href="{{ route('home') }}" class="flex items-center space-x-3 z-50 relative">
                <div class="w-12 h-12 overflow-hidden">
                    <img src="{{ asset('assets/img/logo.png') }}" alt="HealingWay Logo"
                        class="w-full h-full object-contain">
                </div>
                <div class="text-white leading-tight">
                    <div class="text-2xl font-bold"><span class="text-hw-green">Healing</span>Way</div>
                    <div class="text-sm font-semibold text-hw-green">Fertility Centre</div>
                </div>
            </a>

            <div class="hidden lg:flex items-center space-x-8 text-lg font-medium text-white">
                @foreach ($menuItems as $item)
                    @if ($item['type'] === 'link')
                        <a href="{{ route($item['route']) }}"
                            class="nav-link hover:text-hw-green transition-colors {{ request()->routeIs($item['route']) ? 'text-hw-green' : '' }}">
                            {{ $item['label'] }}
                        </a>
                    @elseif($item['type'] === 'dropdown')
                        <div x-data="{ open: false }" class="relative" @mouseenter="open = true"
                            @mouseleave="open = false">
                            <button @click="open = !open"
                                class="nav-link inline-flex items-center gap-1 hover:text-hw-green transition-colors">
                                {{ $item['label'] }}
                                <i data-lucide="chevron-down" :class="{ 'rotate-180': open }"
                                    class="w-4 h-4 transition-transform duration-200"></i>
                            </button>
                            <div x-show="open" x-transition:enter="transition ease-out duration-200"
                                x-transition:enter-start="opacity-0 translate-y-2"
                                x-transition:enter-end="opacity-100 translate-y-0"
                                x-transition:leave="transition ease-in duration-150"
                                x-transition:leave-start="opacity-100 translate-y-0"
                                x-transition:leave-end="opacity-0 translate-y-2"
                                class="absolute left-0 mt-2 w-64 bg-white border border-gray-100 shadow-xl rounded-lg overflow-hidden z-50">
                                <div class="py-2">
                                    @if (isset($item['main_link']))
                                        <a href="{{ $item['main_link'] }}"
                                            class="block px-4 py-2 text-sm text-gray-800 hover:bg-hw-blue hover:text-white transition-colors border-b border-gray-100 font-semibold">
                                            All {{ $item['label'] }}
                                        </a>
                                    @endif
                                    @foreach ($item['children'] as $child)
                                        <a href="{{ $child['url'] }}"
                                            class="block px-4 py-2 text-sm text-gray-600 hover:bg-hw-blue hover:text-white transition-colors">
                                            {{ $child['label'] }}
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach

                <a href="{{ route('book-appointment') }}"
                    class="bg-hw-blue border border-white text-sm font-bold text-white px-5 py-2.5 rounded-lg hover:bg-white hover:text-hw-blue transition-all duration-300 shadow-md transform hover:-translate-y-0.5">
                    Book Appointment
                </a>
            </div>

            <button @click="mobileOpen = true" class="lg:hidden bg-blue-50 text-hw-blue  rounded-lg p-2 focus:outline-none z-50">
                <i data-lucide="menu" class="w-6 h-6"></i>
            </button>
        </div>
    </div>

    <div x-show="mobileOpen" style="display: none;" class="lg:hidden fixed inset-0 z-[60] flex">
        <div x-show="mobileOpen" x-transition:enter="transition-opacity ease-linear duration-300"
            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
            x-transition:leave="transition-opacity ease-linear duration-300" x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0" @click="mobileOpen = false"
            class="fixed inset-0 bg-black/60 backdrop-blur-sm"></div>

        <div x-show="mobileOpen" x-transition:enter="transition ease-in-out duration-300 transform"
            x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0"
            x-transition:leave="transition ease-in-out duration-300 transform" x-transition:leave-start="translate-x-0"
            x-transition:leave-end="-translate-x-full"
            class="relative w-full max-w-xs bg-white h-full shadow-2xl flex flex-col overflow-y-auto">
            <div class="px-6 py-5 border-b border-gray-100 flex justify-between items-center bg-hw-blue">
                <div class="text-xl font-bold text-white">
                    <span class="text-hw-green">Healing</span>Way
                </div>
                <button @click="mobileOpen = false" class="text-white hover:text-hw-green transition-colors">
                    <i data-lucide="x" class="w-6 h-6"></i>
                </button>
            </div>

            <div class="px-4 py-6 space-y-2 flex-1">
                @foreach ($menuItems as $item)
                    @if ($item['type'] === 'link')
                        <a href="{{ route($item['route']) }}"
                            class="block px-4 py-3 text-base font-medium rounded-lg transition-colors {{ request()->routeIs($item['route']) ? 'bg-indigo-50 text-hw-blue' : 'text-gray-700 hover:bg-gray-50 hover:text-hw-blue' }}">
                            {{ $item['label'] }}
                        </a>
                    @elseif($item['type'] === 'dropdown')
                        <div>
                            <button @click="toggleMobileItem('{{ $item['id'] }}')"
                                class="w-full flex items-center justify-between px-4 py-3 text-base font-medium text-gray-700 rounded-lg hover:bg-gray-50 hover:text-hw-blue transition-colors group"
                                :class="mobileActive === '{{ $item['id'] }}' ? 'bg-gray-50 text-hw-blue' : ''">
                                {{ $item['label'] }}
                                <i data-lucide="chevron-down"
                                    class="w-5 h-5 text-gray-400 transition-transform duration-300"
                                    :class="mobileActive === '{{ $item['id'] }}' ? 'rotate-180 text-hw-blue' : ''"></i>
                            </button>

                            <div x-show="mobileActive === '{{ $item['id'] }}'"
                                x-transition:enter="transition-all ease-out duration-200"
                                x-transition:enter-start="opacity-0 max-h-0"
                                x-transition:enter-end="opacity-100 max-h-96"
                                x-transition:leave="transition-all ease-in duration-200"
                                x-transition:leave-start="opacity-100 max-h-96"
                                x-transition:leave-end="opacity-0 max-h-0"
                                class="overflow-hidden bg-gray-50/50 rounded-b-lg mb-2">
                                <div class="px-4 py-2 space-y-1 border-l-2 border-hw-blue ml-4 my-2">
                                    @if (isset($item['main_link']))
                                        <a href="{{ $item['main_link'] }}"
                                            class="block px-4 py-2 text-sm font-semibold text-hw-blue hover:text-hw-green">
                                            All {{ $item['label'] }}
                                        </a>
                                    @endif
                                    @foreach ($item['children'] as $child)
                                        <a href="{{ $child['url'] }}"
                                            class="block px-4 py-2 text-sm text-gray-600 hover:text-hw-blue transition-colors">
                                            {{ $child['label'] }}
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>

            <div class="p-6 border-t border-gray-100 bg-gray-50">
                <a href="{{ route('book-appointment') }}"
                    class="flex items-center justify-center w-full px-6 py-3 text-base font-bold text-white bg-hw-blue rounded-full shadow hover:bg-opacity-90 transition-all">
                    Book Appointment
                </a>
                <div class="mt-4 text-center">
                    <p class="text-xs text-gray-400">Copyright &copy; {{ date('Y') }} HealingWay Fertility</p>
                </div>
            </div>
        </div>
    </div>
</nav>
