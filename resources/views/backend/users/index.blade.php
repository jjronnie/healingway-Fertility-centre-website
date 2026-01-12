<x-app-layout>

    <x-page-title title="Users Management" subtitle="Manage application users here." />

    <h2 class="font-bold text-lg ml-5 p-6">Admins</h2>



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

    <h2 class="font-bold text-lg ml-5 p-6">Users</h2>


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

                <x-table.cell>

                    <a href="{{ route('admin.users.show', $user) }}" class="btn">
                        <i data-lucide="eye" class="w-4 h-4"></i>
                    </a>

                    <a href="{{ route('admin.users.edit', $user) }}" class="btn">
                        <i data-lucide="edit" class="w-4 h-4"></i>
                    </a>

                    @can('delete-users')
                        <x-confirm-modal :action="route('admin.users.destroy', $user)"
                            warning="Are you sure you want to delete this user? This action cannot be undone."
                            triggerIcon="trash" />
                    @endcan


                </x-table.cell>
            </x-table.row>
        @endforeach

    </x-table>

    <div class="text-center p-4">
        {{ $users->links() }}
    </div>

</x-app-layout>
