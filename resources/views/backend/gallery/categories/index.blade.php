<x-app-layout>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold text-gray-900">Gallery Categories</h2>
                <x-popup-modal title="Add Category">
                    <x-slot:trigger>
                        <button type="button" class="btn-success">Add Category</button>
                    </x-slot:trigger>

                    <form action="{{ route('admin.gallery.categories.store') }}" method="POST" class="space-y-4">
                        @csrf
                        <div>
                            <label class="label">Category Name</label>
                            <input type="text" name="name" class="input" required>
                        </div>

                        <div class="flex items-center justify-end gap-3">
                            <button type="button" class="btn-gray" @click="open = false">Cancel</button>
                            <button type="submit" class="btn">Create Category</button>
                        </div>
                    </form>
                </x-popup-modal>
            </div>

            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg relative mb-6"
                    role="alert">
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif

            <x-table :headers="['#', 'Category', 'Images', 'Created']" showActions="true">
                @forelse ($categories as $category)
                    <x-table.row>
                        <x-table.cell>
                            {{ $loop->iteration }}
                        </x-table.cell>

                        <x-table.cell>
                            <div class="font-medium text-gray-900">
                                <a href="{{ route('gallery.category', $category->slug) }}" target="_blank"
                                    rel="noopener noreferrer" class="hover:underline">
                                    {{ $category->name }}
                                </a>
                            </div>
                            <div class="text-xs text-gray-500">/{{ $category->slug }}</div>
                        </x-table.cell>

                        <x-table.cell>
                            {{ $category->images_count }}
                        </x-table.cell>

                        <x-table.cell>
                            {{ $category->created_at->format('M d, Y') }}
                        </x-table.cell>

                        <x-table.cell>
                            <div class="flex space-x-2">
                                <x-popup-modal title="Edit Category">
                                    <x-slot:trigger>
                                        <button type="button" class="btn" title="Edit">
                                            <i data-lucide="edit" class="w-4 h-4"></i>
                                        </button>
                                    </x-slot:trigger>

                                    <form action="{{ route('admin.gallery.categories.update', $category) }}"
                                        method="POST" class="space-y-4">
                                        @csrf
                                        @method('PUT')
                                        <div>
                                            <label class="label">Category Name</label>
                                            <input type="text" name="name" class="input" value="{{ $category->name }}"
                                                required>
                                        </div>

                                        <div class="flex items-center justify-end gap-3">
                                            <button type="button" class="btn-gray" @click="open = false">Cancel</button>
                                            <button type="submit" class="btn">Save Changes</button>
                                        </div>
                                    </form>
                                </x-popup-modal>

                                <x-confirm-modal :action="route('admin.gallery.categories.destroy', $category)"
                                    warning="Are you sure you want to delete this category?" triggerIcon="trash-2" />
                            </div>
                        </x-table.cell>
                    </x-table.row>
                @empty
                    <x-table.row>
                        <x-table.cell colspan="5" class="text-center text-gray-500">
                            No categories found.
                        </x-table.cell>
                    </x-table.row>
                @endforelse
            </x-table>
        </div>
    </div>
</x-app-layout>
