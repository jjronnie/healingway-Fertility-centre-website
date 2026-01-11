<x-app-layout>

    <x-page-title title="Users Management" subtitle="Manage application users here." />

    <x-table :headers="['#', 'Name', 'Email', 'Status', 'Created']" showActions="false">
    @foreach ($users as $user)
        <x-table.row>
            <x-table.cell>{{ $loop->iteration }}</x-table.cell>
            <x-table.cell>{{ $user->name }}</x-table.cell>
            <x-table.cell>{{ $user->email }}</x-table.cell>
            <x-table.cell>
                <x-status-badge :status="$user->status" />
            </x-table.cell>
            <x-table.cell>{{ $user->created_at->format('M d, Y') }}</x-table.cell>
        </x-table.row>
    @endforeach
  
</x-table>
 
</x-app-layout>
