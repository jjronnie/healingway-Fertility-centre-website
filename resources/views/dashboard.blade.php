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

    <x-page-title title="{{ $greeting }}, {{ auth()->user()->name }}" />



    <div class="grid grid-cols-1 sm:grid-cols-3 lg:grid-cols-4 gap-4 mb-6">
        <!-- card -->
        <x-stat-card title="Total Admins" value="{{ $adminTotal }}" icon="shield" />
        <x-stat-card title="Total Clients" value="{{ $userTotal }}" icon="users" />
        <x-stat-card title="Total Services" value="{{ $totalServices }}" icon="heart" />
        <x-stat-card title="Total Appointments" value="{{ $appointmentTotal }}" icon="calendar" />

    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
        <x-stat-card title="Pending" value="{{ $pendingAppointments }}" icon="clock" />
        <x-stat-card title="Confirmed" value="{{ $confirmedAppointments }}" icon="calendar-check-2" />
        <x-stat-card title="Completed" value="{{ $completedAppointments }}" icon="check-circle" />
        <x-stat-card title="Cancelled" value="{{ $cancelledAppointments }}" icon="x-circle" />
    </div>
    <div class="p-6">
    <x-page-title title="Recent Activity" />


<x-empty-state message="No Data." />



{{-- <x-table :headers="['#' ]" showActions="false">
    <x-table.row>
        <x-table.cell></x-table.cell>
    </x-table.row>
</x-table> --}}

</div>
</x-app-layout>
