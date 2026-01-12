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



    <div class="grid grid-cols-1 sm:grid-cols-3 lg:grid-cols-4 gap-4 mb-8">
        <!-- card -->
        <x-stat-card title="Total Admins" value="{{ $adminTotal }}" icon="shield" />
        <x-stat-card title="Total Clients" value="{{ $userTotal }}" icon="users" />
        <x-stat-card title="Total Services" value="{{ $totalServices }}" icon="heart" />
        <x-stat-card title="Total Appointments" value="25" icon="calendar" />

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
    <!-- Charts Section -->

    <x-page-title title="Charts and Analytics" />

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mt-5 mb-8 text-center">

        <div class="bg-white rounded-lg  p-6">
            <h3 class="text-lg font-semibold mb-4">User by Signup Method</h3>
            <div class="h-64">
                {!! $signupMethodChart->container() !!}
            </div>
        </div>
    </div>


    {!! $signupMethodChart->script() !!}




</x-app-layout>
