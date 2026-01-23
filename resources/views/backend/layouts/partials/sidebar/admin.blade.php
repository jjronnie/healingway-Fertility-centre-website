<div class="w-80 lg:w-64 bg-primary text-white flex flex-col fixed top-0 left-0 h-screen z-40 lg:z-[10000] transform transition-transform duration-300 -translate-x-full lg:translate-x-0"
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

            {{-- Dashboard --}}
            <a href="{{ route('dashboard') }}"
                class="sidebar-link {{ request()->routeIs('dashboard') ? 'sidebar-link-active' : '' }}">
                <i data-lucide="layout-dashboard" class="w-4 h-4 "></i>
                <span>Dashboard</span>
            </a>
            <div class="space-y-1">

                <div class="flex items-center pt-4">
                    <span class="text-gray-200 text-sm mr-4 ml-4">System MGT</span>
                    <div class="flex-1 border-t border-gray-500 mr-4"></div>
                </div>




                <a href="{{ route('admin.appointments.index') }}"
                    class="sidebar-link {{ request()->routeIs('admin.appointments.*') ? 'sidebar-link-active' : '' }}">

                    <i data-lucide="calendar-clock" class="w-4 h-4 "></i>
                    <span>Appointments</span>
                </a>




                <a href="{{ route('admin.users.index') }}"
                    class="sidebar-link {{ request()->routeIs('admin.users.*') ? 'sidebar-link-active' : '' }}">

                    <i data-lucide="users" class="w-4 h-4 "></i>
                    <span>Users</span>
                </a>

                <div class="flex items-center pt-4">

                    <span class="text-gray-200 text-sm mr-4 ml-4">Website MGT</span>
                    <div class="flex-1 border-t border-gray-500 mr-4"></div>
                </div>




                <a href="{{ route('admin.staff.index') }}"
                    class="sidebar-link {{ request()->routeIs('admin.staff.*') ? 'sidebar-link-active' : '' }}">

                    <i data-lucide="briefcase" class="w-4 h-4 "></i>
                    <span>Staff</span>
                </a>




                <a href="{{ route('admin.services.index') }}"
                    class="sidebar-link {{ request()->routeIs('admin.services.*') ? 'sidebar-link-active' : '' }}">

                    <i data-lucide="heart" class="w-4 h-4 "></i>
                    <span>Services</span>
                </a>


                <a href="{{ route('admin.events.index') }}"
                    class="sidebar-link {{ request()->routeIs('admin.events.*') ? 'sidebar-link-active' : '' }}">

                    <i data-lucide="calendar-1" class="w-4 h-4 "></i>
                    <span>Events</span>
                </a>












            </div>
        </nav>

    </div>


       @include('backend.layouts.partials.sidebar.footer')


   
</div>
