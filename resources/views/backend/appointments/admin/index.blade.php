<x-app-layout>

    <x-page-title title="Manage Appointments"/>

    @if($appointments->count())
        <x-table :headers="['#', 'Patient', 'Person to See', 'Date & Time', 'Status']" showActions="true">
            @foreach($appointments as $appointment)
                <x-table.row>
                    <x-table.cell>{{ $loop->iteration }}</x-table.cell>
                    <x-table.cell>{{ $appointment->user->name }}</x-table.cell>
                    <x-table.cell>{{ $appointment->person_to_see }}</x-table.cell>
                    <x-table.cell>{{ $appointment->appointment_date->format('d M, Y H:i') }}</x-table.cell>
                    <x-table.cell>
                        <x-status-badge :status="$appointment->status" />
                    </x-table.cell>


                    <x-table.cell>
                        @include('backend.appointments.admin.show')
                      
                    </x-table.cell>


                </x-table.row>
            @endforeach
        </x-table>

        <!-- Pagination -->
        <div class="mt-4">
            {{ $appointments->links() }}
        </div>
    @else
        <x-empty-state message="No appointments found." />
    @endif

</x-app-layout>
