<x-app-layout>

     <!-- Dashboard Overview -->
            <div x-show="activeSection === 'dashboard'" class="space-y-6">
                <div class="flex items-center justify-between">
                    <h1 class="text-3xl font-bold text-hw-blue">Dashboard Overview</h1>
                    <div class="text-sm text-gray-600">Last updated: <span x-text="new Date().toLocaleDateString()"></span></div>
                </div>

                <!-- Stats Cards -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <div class="bg-white p-6 rounded-xl shadow-sm border-l-4 border-hw-green">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm text-gray-600">Total Patients</p>
                                <p class="text-3xl font-bold text-hw-blue">1,247</p>
                                <p class="text-sm text-green-600">+12% this month</p>
                            </div>
                            <div class="bg-hw-green p-3 rounded-full">
                                <i data-lucide="users" class="w-8 h-8 text-hw-green"></i>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white p-6 rounded-xl shadow-sm border-l-4 border-blue-400">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm text-gray-600">Today's Appointments</p>
                                <p class="text-3xl font-bold text-hw-blue">28</p>
                                <p class="text-sm text-blue-600">3 upcoming</p>
                            </div>
                            <div class="bg-blue-100 p-3 rounded-full">
                                <i data-lucide="calendar" class="w-8 h-8 text-blue-500"></i>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white p-6 rounded-xl shadow-sm border-l-4 border-green-400">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm text-gray-600">Success Rate</p>
                                <p class="text-3xl font-bold text-hw-blue">87%</p>
                                <p class="text-sm text-green-600">+2% vs last month</p>
                            </div>
                            <div class="bg-green-100 p-3 rounded-full">
                                <i data-lucide="trending-up" class="w-8 h-8 text-green-500"></i>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white p-6 rounded-xl shadow-sm border-l-4 border-purple-400">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm text-gray-600">Revenue</p>
                                <p class="text-3xl font-bold text-hw-blue">$124K</p>
                                <p class="text-sm text-purple-600">This month</p>
                            </div>
                            <div class="bg-purple-100 p-3 rounded-full">
                                <i data-lucide="dollar-sign" class="w-8 h-8 text-purple-500"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Charts -->
                {{-- <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    <div class="bg-white p-6 rounded-xl shadow-sm">
                        <h2 class="text-xl font-bold text-hw-blue mb-4">Appointments This Week</h2>
                        <canvas id="appointmentsChart" class="w-full h-64"></canvas>
                    </div>
                    <div class="bg-white p-6 rounded-xl shadow-sm">
                        <h2 class="text-xl font-bold text-hw-blue mb-4">Treatment Distribution</h2>
                        <canvas id="treatmentChart" class="w-full h-64"></canvas>
                    </div>
                </div> --}}

                <!-- Recent Activity -->
                <div class="bg-white p-6 rounded-xl shadow-sm">
                    <h2 class="text-xl font-bold text-hw-blue mb-4">Recent Activity</h2>
                    <div class="space-y-4">
                        <div class="flex items-center space-x-4 p-3 hover:bg-gray-50 rounded-lg">
                            <div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center">
                                <i data-lucide="user-plus" class="w-5 h-5 text-green-600"></i>
                            </div>
                            <div class="flex-1">
                                <p class="font-semibold text-gray-900">New patient registration</p>
                                <p class="text-sm text-gray-600">Sarah Johnson registered for IVF consultation</p>
                            </div>
                            <div class="text-sm text-gray-500">2 min ago</div>
                        </div>
                        
                        <div class="flex items-center space-x-4 p-3 hover:bg-gray-50 rounded-lg">
                            <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center">
                                <i data-lucide="calendar-check" class="w-5 h-5 text-blue-600"></i>
                            </div>
                            <div class="flex-1">
                                <p class="font-semibold text-gray-900">Appointment completed</p>
                                <p class="text-sm text-gray-600">Dr. Smith completed consultation with Maria Garcia</p>
                            </div>
                            <div class="text-sm text-gray-500">15 min ago</div>
                        </div>
                        
                        <div class="flex items-center space-x-4 p-3 hover:bg-gray-50 rounded-lg">
                            <div class="w-10 h-10 bg-yellow-100 rounded-full flex items-center justify-center">
                                <i data-lucide="alert-triangle" class="w-5 h-5 text-yellow-600"></i>
                            </div>
                            <div class="flex-1">
                                <p class="font-semibold text-gray-900">Lab results pending</p>
                                <p class="text-sm text-gray-600">3 lab results require doctor review</p>
                            </div>
                            <div class="text-sm text-gray-500">1 hour ago</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Appointments Section -->
            <div x-show="activeSection === 'appointments'" class="space-y-6">
                <div class="flex items-center justify-between">
                    <h1 class="text-3xl font-bold text-hw-blue">Appointments</h1>
                    <button class="bg-hw-green text-hw-blue px-4 py-2 rounded-lg font-semibold hover:bg-hw-green transition-colors">
                        <i data-lucide="plus" class="w-4 h-4 inline mr-2"></i>New Appointment
                    </button>
                </div>

                <!-- Appointments Table -->
                <div class="bg-white rounded-xl shadow-sm overflow-hidden">
                    <div class="p-6 border-b border-gray-200">
                        <div class="flex items-center justify-between">
                            <h2 class="text-xl font-bold text-hw-blue">Today's Appointments</h2>
                            <div class="flex space-x-2">
                                <button class="px-3 py-2 text-sm bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors">All</button>
                                <button class="px-3 py-2 text-sm bg-hw-green text-hw-blue rounded-lg">Scheduled</button>
                                <button class="px-3 py-2 text-sm bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors">Completed</button>
                            </div>
                        </div>
                    </div>
                    
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Time</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Patient</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Doctor</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Service</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">09:00 AM</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="w-8 h-8 bg-hw-green rounded-full flex items-center justify-center mr-3">
                                                <span class="text-xs font-semibold text-hw-blue">SJ</span>
                                            </div>
                                            <div>
                                                <div class="text-sm font-medium text-gray-900">Sarah Johnson</div>
                                                <div class="text-sm text-gray-500">sarah.j@email.com</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Dr. Smith</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">IVF Consultation</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                            Completed
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <button class="text-hw-blue hover:text-hw-blue mr-3">View</button>
                                        <button class="text-gray-600 hover:text-gray-900">Edit</button>
                                    </td>
                                </tr>
                                <!-- More rows would go here -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Other sections would follow similar patterns -->
            <div x-show="activeSection !== 'dashboard' && activeSection !== 'appointments'" class="text-center py-12">
                <i data-lucide="construction" class="w-16 h-16 text-gray-400 mx-auto mb-4"></i>
                <h2 class="text-2xl font-bold text-gray-600 mb-2">Section Under Construction</h2>
                <p class="text-gray-500" x-text="`${activeSection.charAt(0).toUpperCase() + activeSection.slice(1)} section is being developed`"></p>
            </div>


</x-app-layout>