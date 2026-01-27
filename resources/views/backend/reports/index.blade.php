<x-app-layout>
    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <x-page-title title="Reports" subtitle="Insights on users and appointments." />
        </div>
        <button type="button" class="btn-gray" onclick="window.print()">
            Print Report
        </button>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mt-6">
        <div class="bg-white rounded-lg p-6 shadow-sm">
            <h3 class="text-lg font-semibold">User Signup Methods</h3>
            <p class="text-sm text-gray-500 mb-4">Where users are coming from.</p>
            <div class="h-64">
                {!! $signupMethodChart->container() !!}
            </div>
        </div>

        <div class="bg-white rounded-lg p-6 shadow-sm">
            <h3 class="text-lg font-semibold">Appointment Status Breakdown</h3>
            <p class="text-sm text-gray-500 mb-4">Pending vs confirmed vs completed vs cancelled.</p>
            <div class="h-64">
                {!! $appointmentStatusChart->container() !!}
            </div>
        </div>

        <div class="bg-white rounded-lg p-6 shadow-sm">
            <h3 class="text-lg font-semibold">Appointments Over Time</h3>
            <p class="text-sm text-gray-500 mb-4">Trend of bookings per month.</p>
            <div class="h-64">
                {!! $appointmentsByMonthChart->container() !!}
            </div>
        </div>

        <div class="bg-white rounded-lg p-6 shadow-sm">
            <h3 class="text-lg font-semibold">Top Services by Bookings</h3>
            <p class="text-sm text-gray-500 mb-4">Most requested services.</p>
            <div class="h-64">
                {!! $appointmentsByServiceChart->container() !!}
            </div>
        </div>
    </div>

    {!! $signupMethodChart->script() !!}
    {!! $appointmentStatusChart->script() !!}
    {!! $appointmentsByMonthChart->script() !!}
    {!! $appointmentsByServiceChart->script() !!}
</x-app-layout>
