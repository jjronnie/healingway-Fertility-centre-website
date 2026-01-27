<x-app-layout>

    <x-page-title title="Patients" subtitle="Manage patient accounts." />

    <x-table :headers="['#', 'Name', 'Email', 'Status', 'Created']" showActions="false">
        @foreach ($patients as $patient)
            <x-table.row>
                <x-table.cell>{{ $loop->iteration }}</x-table.cell>
                <x-table.cell>{{ $patient->name }}</x-table.cell>
                <x-table.cell>{{ $patient->email }}</x-table.cell>
                <x-table.cell>
                    <x-status-badge :status="$patient->status" />
                </x-table.cell>
                <x-table.cell>{{ $patient->created_at->format('M d, Y') }}</x-table.cell>

                <x-table.cell>
                    <a href="{{ route('admin.users.show', $patient) }}" class="btn">
                        <i data-lucide="eye" class="w-4 h-4"></i>
                    </a>

                    <a href="{{ route('admin.users.edit', $patient) }}" class="btn">
                        <i data-lucide="edit" class="w-4 h-4"></i>
                    </a>

                    @can('delete-users')
                        <x-confirm-modal :action="route('admin.users.destroy', $patient)"
                            warning="Are you sure you want to delete this user? This action cannot be undone."
                            triggerIcon="trash" />
                    @endcan
                </x-table.cell>
            </x-table.row>
        @endforeach
    </x-table>

    <div class="text-center p-4">
        {{ $patients->links() }}
    </div>

</x-app-layout>
