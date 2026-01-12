<x-app-layout>
    <div class="max-w-full mx-auto  p-8">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold text-gray-800">Manage staff</h1>
            <a href="{{ route('admin.staff.create') }}" class="btn-success">
                Add New staff
            </a>
        </div>

        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg relative mb-6"
                role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        <x-table :headers="['#', 'Photo', 'Name', 'Position', 'Display Order']" showActions="false">
            @forelse ($staff as $staff)
                <x-table.row>
                    <x-table.cell>
                        {{ $loop->iteration }}
                    </x-table.cell>

                    {{-- Photo --}}
                    <x-table.cell>
                        @if ($staff->photo)
                            <img src="{{ asset($staff->photo) }}" alt="{{ $staff->name }}"
                                class="w-12 h-12 object-cover rounded-full">
                        @else
                            <img src="https://placehold.co/48x48/CCCCCC/FFFFFF?text=No+Photo" alt="No Photo"
                                class="w-12 h-12 object-cover rounded-full">
                        @endif
                    </x-table.cell>

                    {{-- Name --}}
                    <x-table.cell>
                        {{ $staff->name }}
                    </x-table.cell>

                    {{-- Position --}}
                    <x-table.cell>
                        {{ $staff->position }}
                    </x-table.cell>

                    {{-- Display Order --}}
                    <x-table.cell>
                        {{ $staff->display_position }}
                    </x-table.cell>

                    {{-- Actions --}}
                    <x-table.cell class="flex items-center justify-center space-x-2">
                        <a href="{{ route('admin.staff.show', $staff) }}" class="btn">
                            <i data-lucide="eye" class="w-4 h-4 "></i>

                        </a>

                        <a href="{{ route('admin.staff.edit', $staff) }}" class="btn">
                            <i data-lucide="edit" class="w-4 h-4 "></i>
                        </a>


                        <x-confirm-modal :action="route('admin.staff.destroy', $staff)"
                            warning="Are you sure you want to delete this staff? This action cannot be undone."
                            triggerIcon="trash-2" />


                    </x-table.cell>
                </x-table.row>
            @empty
                <x-table.row>
                    <x-table.cell colspan="5" class="text-center text-gray-500">
                        No staff found.
                    </x-table.cell>
                </x-table.row>
            @endforelse
        </x-table>

        {{-- <div class="mt-6">
            {{ $staff->links() }}
        </div> --}}
    </div>
</x-app-layout>
