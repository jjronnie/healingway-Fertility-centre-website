<div class="fixed inset-y-0 left-0 z-50 w-64 bg-hw-blue text-white transform transition-transform duration-300 ease-in-out lg:translate-x-0"
     :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'">
    <div class="flex items-center justify-between h-16 px-4 border-b border-white">
        <h1 class="text-xl font-bold">HealingWay IVF</h1>
        <button @click="sidebarOpen = false" class="lg:hidden">
            <i data-lucide="x" class="w-6 h-6"></i>
        </button>
    </div>

    <nav class="mt-8">
        <div class="px-4 mb-4">
            <div class="flex items-center space-x-3 p-3 bg-hw-blue rounded-lg">
                <div class="w-10 h-10 bg-hw-green rounded-full flex items-center justify-center">
                    <i data-lucide="user" class="w-5 h-5 text-hw-blue"></i>
                </div>
                <div>
                    <p class="font-semibold">Dr. Admin</p>
                    <p class="text-sm text-hw-blue">Administrator</p>
                </div>
            </div>
        </div>

        <div class="space-y-1 px-4">
            <a href="{{ route('dashboard') }}"
               class="flex items-center space-x-3 px-3 py-2 rounded-lg transition-colors {{ request()->routeIs('dashboard') ? 'bg-white text-hw-blue font-semibold' : 'hover:bg-hw-blue' }}">
                <i data-lucide="layout-dashboard" class="w-5 h-5"></i>
                <span>Dashboard</span>
            </a>

            {{-- <a href="{{ route('appointments.index') }}"
               class="flex items-center space-x-3 px-3 py-2 rounded-lg transition-colors {{ request()->routeIs('appointments.*') ? 'bg-white text-hw-blue font-semibold' : 'hover:bg-hw-blue' }}">
                <i data-lucide="calendar" class="w-5 h-5"></i>
                <span>Appointments</span>
            </a>

            <a href="{{ route('patients.index') }}"
               class="flex items-center space-x-3 px-3 py-2 rounded-lg transition-colors {{ request()->routeIs('patients.*') ? 'bg-white text-hw-blue font-semibold' : 'hover:bg-hw-blue' }}">
                <i data-lucide="users" class="w-5 h-5"></i>
                <span>Patients</span>
            </a>
            --}}

            <a href="{{ route('admin.doctors.index') }}"
               class="flex items-center space-x-3 px-3 py-2 rounded-lg transition-colors {{ request()->routeIs('admin.doctors.*') ? 'bg-white text-hw-blue font-semibold' : 'hover:bg-hw-blue' }}">
                <i data-lucide="user-check" class="w-5 h-5"></i>
                <span>Doctors</span>
            </a> 

            <a href="{{ route('services.index') }}"
               class="flex items-center space-x-3 px-3 py-2 rounded-lg transition-colors {{ request()->routeIs('services.*') ? 'bg-white text-hw-blue font-semibold' : 'hover:bg-hw-blue' }}">
                <i data-lucide="heart" class="w-5 h-5"></i>
                <span>Services</span>
            </a>
          <!-- Logout Link (Trigger Modal) -->
<button onclick="document.getElementById('logoutModal').classList.remove('hidden')" 
        class="flex items-center space-x-3 px-3 py-2 rounded-lg transition-colors hover:bg-hw-blue">
    <i data-lucide="log-out" class="w-5 h-5"></i>
    <span>Logout</span>
</button>

{{-- 
            <a href="{{ route('messages.index') }}"
               class="flex items-center space-x-3 px-3 py-2 rounded-lg transition-colors {{ request()->routeIs('messages.*') ? 'bg-white text-hw-blue font-semibold' : 'hover:bg-hw-blue' }}">
                <i data-lucide="mail" class="w-5 h-5"></i>
                <span>Messages</span>
                <span class="bg-hw-green text-hw-blue text-xs px-2 py-1 rounded-full">3</span>
            </a>

            <a href="{{ route('reports.index') }}"
               class="flex items-center space-x-3 px-3 py-2 rounded-lg transition-colors {{ request()->routeIs('reports.*') ? 'bg-white text-hw-blue font-semibold' : 'hover:bg-hw-blue' }}">
                <i data-lucide="bar-chart" class="w-5 h-5"></i>
                <span>Reports</span>
            </a> --}}
        </div>
    </nav>




 
</div>

    <!-- Logout Confirmation Modal -->
<div id="logoutModal" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
    <div class="bg-white rounded-2xl shadow-xl p-6 w-96">
        <h2 class="text-lg font-semibold text-gray-800 mb-4">Confirm Logout</h2>
        <p class="text-gray-600 mb-6">Are you sure you want to log out?</p>
        <div class="flex justify-end space-x-3">
            <button onclick="document.getElementById('logoutModal').classList.add('hidden')" 
                    class="px-4 py-2 rounded-lg border border-gray-300 text-gray-700 hover:bg-gray-100">
                Cancel
            </button>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" 
                        class="px-4 py-2 rounded-lg bg-red-600 text-white hover:bg-red-700">
                    Logout
                </button>
            </form>
        </div>
    </div>
</div>
