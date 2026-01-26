<x-app-layout>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold text-gray-900">Events</h2>
                <a href="{{ route('admin.events.create') }}" class="btn-success">
                    Add New Event
                </a>
            </div>

            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg relative mb-6"
                    role="alert">
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif

            <x-table :headers="['#', 'Event', 'Date', 'Status', 'Created']" showActions="true">

                @forelse ($events as $event)
                    <x-table.row>
                        <x-table.cell>
                            {{ $loop->iteration }}
                        </x-table.cell>

                        <x-table.cell>
                            <div class="flex items-center gap-3">
                                @if ($event->featured_image)
                                    <img src="{{ asset('storage/' . $event->featured_image) }}"
                                        alt="{{ $event->title }}" class="w-12 h-12 object-cover rounded-md">
                                @else
                                    <div
                                        class="w-12 h-12 bg-gray-200 flex items-center justify-center rounded-md text-gray-500">
                                        <i data-lucide="image" class="w-6 h-6"></i>
                                    </div>
                                @endif
                                <span class="font-medium text-gray-900">
                                    {{ $event->title }}
                                </span>
                        </x-table.cell>

                        <x-table.cell>
                            <div class="space-y-1">
                                <div>
                                    <span class="text-gray-600">Date:</span>
                                    <span class="font-medium">{{ $event->formatted_date }}</span>
                                </div>
                                <div>
                                    <span class="text-gray-600">Time:</span>
                                    <span class="font-medium">{{ $event->formatted_time }}</span>
                                </div>
                            </div>
                        </x-table.cell>


                        <x-table.cell>
                            <x-status-badge :status="$event->status" />
                        </x-table.cell>




                        <x-table.cell>
                            <div class="flex flex-col">
                                <span class="text-sm font-medium text-gray-700">
                                    {{ $event->created_at->format('Y-m-d h:i:s A') }}
                                </span>

                                <span class="text-sm text-gray-500">
                                    By: {{ $event->creator ? ucfirst($event->creator->name) : '-' }}
                                </span>
                            </div>
                        </x-table.cell>


                        <x-table.cell>
                            <div class="flex space-x-2">
                                @include('backend.events.partials.show')

                                <a href="{{ route('admin.events.edit', $event->slug) }}" class="btn">
                                    <i data-lucide="edit" class="w-4 h-4 "></i>

                                </a>

                                <x-confirm-modal :action="route('admin.events.destroy', $event)"
                                    warning="Are you sure you want to delete this event? This action cannot be undone."
                                    triggerIcon="trash-2" />

                            </div>
                        </x-table.cell>
                    </x-table.row>
                @empty
                    <x-table.row>
                        <x-table.cell colspan="3" class="text-center text-gray-500">
                            No events found.
                        </x-table.cell>
                    </x-table.row>
                @endforelse

            </x-table>

        </div>
    </div>
</x-app-layout>
