<x-app-layout>

    @php
        $hour = now()->hour;
        if ($hour < 12) {
            $greeting = 'Good morning';
        } elseif ($hour < 17) {
            $greeting = 'Good afternoon';
        } else {
            $greeting = 'Good evening';
        }
    @endphp

    <div class="flex flex-col mb-4 gap-4 sm:flex-row sm:items-center sm:justify-between">
        <x-page-title title="{{ $greeting }}, {{ auth()->user()->name }}" />

        <div class="flex flex-wrap gap-3">
            <a href="{{ route('user.patient-details.edit') }}" class="btn-gray">
                Complete Profile
            </a>
            <a href="{{ route('user.appointments.create') }}" class="btn">
                Book Appointment
            </a>
        </div>
    </div>

    @if ($profileCompletion < 100)
        <div class="bg-white rounded-lg shadow-sm p-6 mb-6">
            <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                <div class="flex-1">
                    <h3 class="text-lg font-semibold text-gray-800">Complete Your Profile</h3>
                    <p class="text-sm text-gray-500">
                        Help us learn more about you by completing your profile information.
                    </p>
                </div>
                <div class="flex flex-col items-end gap-3">
                    <span class="text-2xl font-semibold text-gray-800">{{ $profileCompletion }}%</span>
                    <a href="{{ route('user.patient-details.edit') }}" class="btn-gray">
                        Complete Profile
                    </a>
                </div>
            </div>

            <div class="mt-4 w-full bg-gray-200 rounded-full h-3">
                <div class="bg-hw-blue h-3 rounded-full" style="width: {{ $profileCompletion }}%"></div>
            </div>
        </div>
    @endif

    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-8">
        <x-stat-card title="Upcoming" value="{{ $upcomingCount }}" icon="calendar-clock" />
        <x-stat-card title="Completed" value="{{ $completedCount }}" icon="check-circle" />
        <x-stat-card title="Cancelled" value="{{ $cancelledCount }}" icon="x-circle" />
    </div>

    <x-page-title title="Your Upcoming Appointments" />

    <div class="grid gap-4 sm:grid-cols-1 md:grid-cols-2">
        @if ($recentAppointments->isEmpty())
            <x-empty-state icon="calendar-x" message="No upcoming appointments yet." />
        @else
            @foreach($recentAppointments as $appointment)
                <x-appointment-card :appointment="$appointment" />
            @endforeach
        @endif
    </div>

</x-app-layout>
