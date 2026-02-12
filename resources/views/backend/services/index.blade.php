<x-app-layout>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold text-gray-900">Services</h2>
                <a href="{{ route('admin.services.create') }}" class="btn-success">
                    Add New Service
                </a>
            </div>

            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg relative mb-6"
                    role="alert">
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif

            <x-table :headers="['#', 'Service', 'Featured', 'Created']" showActions="true">

                @forelse ($services as $service)
                    <x-table.row>
                        <x-table.cell>
                            {{ $loop->iteration }}
                        </x-table.cell>

                        <x-table.cell>
                            <div class="flex items-center gap-3">
                                @php
                                    $serviceImage =
                                        $service->getFirstMediaUrl('photo', 'webp') ?:
                                        ($service->photo
                                            ? asset('storage/' . $service->photo)
                                            : null);
                                @endphp
                                @if ($serviceImage)
                                    <img src="{{ $serviceImage }}" alt="{{ $service->name }}"
                                        class="w-12 h-12 object-cover rounded-md">
                                @else
                                    <div
                                        class="w-12 h-12 bg-gray-200 flex items-center justify-center rounded-md text-gray-500">
                                        <i data-lucide="image" class="w-6 h-6"></i>
                                    </div>
                                @endif
                                <span class="font-medium text-gray-900">
                                    {{ $service->name }}
                                </span>
                        </x-table.cell>




                        <x-table.cell>
                            <span
                                class="px-2 py-1 rounded-md text-xs font-semibold
        {{ $service->is_featured ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-600' }}">
                                {{ $service->is_featured ? 'YES' : 'NO' }}
                            </span>
                        </x-table.cell>


                        <x-table.cell>{{ $service->created_at->format('M d, Y') }}</x-table.cell>


                        <x-table.cell>
                            <div class="flex space-x-2">
                                <a href="{{ route('service.show', $service) }}" target="_blank" class="btn-success">
                                    <i data-lucide="eye" class="w-4 h-4 "></i>

                                </a>

                                <a href="{{ route('admin.services.edit', $service->slug) }}" class="btn">
                                    <i data-lucide="edit" class="w-4 h-4 "></i>

                                </a>

                                <x-confirm-modal :action="route('admin.services.destroy', $service)"
                                    warning="Are you sure you want to delete this service? This action cannot be undone."
                                    triggerIcon="trash-2" />

                            </div>
                        </x-table.cell>
                    </x-table.row>
                @empty
                    <x-table.row>
                        <x-table.cell colspan="3" class="text-center text-gray-500">
                            No services found.
                        </x-table.cell>
                    </x-table.row>
                @endforelse

            </x-table>

        </div>
    </div>
</x-app-layout>
