<x-app-layout>

    <x-page-title title="Admins" subtitle="Manage administrator accounts." />

    <x-table :headers="['#', 'Name', 'Email', 'Status', 'Created']" showActions="false">
        @foreach ($admins as $admin)
            <x-table.row>
                <x-table.cell>{{ $loop->iteration }}</x-table.cell>
                <x-table.cell>{{ $admin->name }}</x-table.cell>
                <x-table.cell>{{ $admin->email }}</x-table.cell>
                <x-table.cell>
                    <x-status-badge :status="$admin->status" />
                </x-table.cell>
                <x-table.cell>{{ $admin->created_at->format('M d, Y') }}</x-table.cell>
                <x-table.cell>
                    <a href="{{ route('admin.users.show', $admin) }}" class="btn">
                        <i data-lucide="eye" class="w-4 h-4"></i>
                    </a>

                    <a href="{{ route('admin.users.edit', $admin) }}" class="btn">
                        <i data-lucide="edit" class="w-4 h-4"></i>
                    </a>
                </x-table.cell>
            </x-table.row>
        @endforeach
    </x-table>

    <div class="text-center p-4">
        {{ $admins->links() }}
    </div>

</x-app-layout>
