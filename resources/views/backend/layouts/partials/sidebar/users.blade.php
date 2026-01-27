<div class="hidden lg:flex w-80 lg:w-64 bg-primary text-white flex-col fixed top-0 left-0 h-screen z-40 lg:z-[10000] transform transition-transform duration-300 -translate-x-full lg:translate-x-0"
    id="sidebar">
    <!-- Sidebar Header -->

    <div class="sidebar-header p-4 border-b border-gray-500 m-2">


        <div class="flex items-center space-x-3">
            <div class="w-14 h-14  rounded-lg flex items-center justify-center text-white font-bold text-lg">
                <span>
                    <a href="{{ url('/') }}">
                        <img src="{{ asset('assets/img/logo.png') }}" alt="">
                    </a>
                </span>
            </div>
            <div class="flex flex-col">
                <span class="text-center whitespace-nowrap text-white font-bold">HealingWay IVF</span>

                <span class="text-xs text-center">Where healing starts</span>
            </div>
        </div>


        <button class="lg:hidden p-1 rounded-md hover:bg-blue-900 transition-colors" id="closeSidebar">

            <i data-lucide="x" class="w-4 h-4  "></i>
        </button>




    </div>

    <!-- Scrollable Navigation Area -->

    <div class="flex-1 overflow-y-auto no-scrollbar">
        <nav class="p-4 space-y-1">

            {{-- Dashboard --}}
            <a href="{{ route('dashboard') }}"
                class="sidebar-link {{ request()->routeIs('dashboard') ? 'sidebar-link-active' : '' }}">
                <i data-lucide="layout-dashboard" class="w-4 h-4 "></i>
                <span>Dashboard</span>
            </a>

            <a href="{{ route('user.appointments.index') }}"
                class="sidebar-link {{ request()->routeIs('user.appointments.*') ? 'sidebar-link-active' : '' }}">
                <i data-lucide="calendar-clock" class="w-4 h-4 "></i>
                <span>Appointments</span>
            </a>

            <a href="{{ route('user.patient-details.edit') }}"
                class="sidebar-link {{ request()->routeIs('user.patient-details.edit') ? 'sidebar-link-active' : '' }}">
                <i data-lucide="user-circle" class="w-4 h-4 "></i>
                <span>Personal Details</span>
            </a>

            <a href="{{ route('profile.edit') }}"
                class="sidebar-link {{ request()->routeIs('profile.*') ? 'sidebar-link-active' : '' }}">
                <i data-lucide="settings" class="w-4 h-4 "></i>
                <span>My Account</span>
            </a>

            <a href="{{ route('home') }}"
                class="sidebar-link {{ request()->routeIs('home') ? 'sidebar-link-active' : '' }}">
                <i data-lucide="home" class="w-4 h-4 "></i>
                <span>Home</span>
            </a>

        </nav>


    </div>

    @include('backend.layouts.partials.sidebar.footer')

</div>






{{-- MOBILE SIDEBAR --}}
<nav class="lg:hidden rounded-t-2xl fixed bottom-0 left-0 right-0 bg-hw-blue border-t border-gray-200  z-50">
    <div class="flex justify-around items-center h-16 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">


        <a href="{{ route('user.appointments.index') }}"
            class="flex flex-col items-center justify-center w-full p-2 transition-colors duration-200
   {{ request()->routeIs('user.appointments.*') ? 'text-hw-green' : 'text-white hover:text-gray-400' }}">
            <i data-lucide="list-checks" class="w-5 h-5"></i>
            <span class="text-xs font-medium mt-1">Activity</span>
        </a>



        <a href="{{ route('dashboard') }}"
            class="flex flex-col items-center justify-center w-full p-2 transition-colors duration-200
   {{ request()->routeIs('dashboard') ? 'text-white' : 'text-white ' }}">

            <img src="{{ asset('assets/img/logo.png') }}" class="w-12 h-12" alt="Home">
        </a>

        <a href="{{ route('profile.edit') }}"
            class="flex flex-col items-center justify-center w-full p-2 transition-colors duration-200
   {{ request()->routeIs('profile.*') ? 'text-hw-green' : 'text-white hover:text-gray-400' }}">
            <i data-lucide="user-round" class="w-5 h-5"></i>
            <span class="text-xs font-medium mt-1">My Account</span>
        </a>


    </div>
</nav>
