<x-app-layout>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-wrap justify-between items-center gap-4 mb-6">
                <h2 class="text-2xl font-bold text-gray-900">Gallery Images</h2>
                <div class="flex flex-wrap gap-2">
                    <a href="{{ route('admin.gallery.images.create') }}" class="btn-success">Upload Images</a>
                    <a href="{{ route('admin.gallery.categories.index') }}" class="btn">Manage Categories</a>
                </div>
            </div>

            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg relative mb-6"
                    role="alert">
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif
            @if (request()->boolean('uploaded'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg relative mb-6"
                    role="alert">
                    <span class="block sm:inline">Images uploaded successfully.</span>
                </div>
            @endif

            <x-table :headers="['#', 'Preview', 'Title', 'Categories', 'Status', 'Created']" showActions="true">
                @forelse ($images as $image)
                    @php
                        $webpUrl = $image->getFirstMediaUrl('gallery', 'webp') ?: asset('assets/img/1.webp');
                        $thumbUrl = $image->getFirstMediaUrl('gallery', 'thumb') ?: $webpUrl;
                    @endphp
                    <x-table.row>
                        <x-table.cell>{{ $loop->iteration }}</x-table.cell>

                        <x-table.cell>
                            <img src="{{ $thumbUrl }}" alt="{{ $image->title ?? 'Gallery image' }}"
                                class="w-12 h-12 object-cover rounded-md">
                        </x-table.cell>

                        <x-table.cell>
                            <span class="font-medium text-gray-900">{{ $image->title }}</span>
                        </x-table.cell>

                        <x-table.cell>
                            <span class="text-gray-600 text-sm">
                                {{ $image->categories->pluck('name')->join(', ') ?: '—' }}
                            </span>
                        </x-table.cell>

                        <x-table.cell>
                            <span
                                class="px-2 py-1 rounded-md text-xs font-semibold {{ $image->is_ready ? 'bg-green-100 text-green-700' : 'bg-yellow-100 text-yellow-700' }}">
                                {{ $image->is_ready ? 'READY' : 'PROCESSING' }}
                            </span>
                        </x-table.cell>

                        <x-table.cell>{{ $image->created_at->format('M d, Y') }}</x-table.cell>

                        <x-table.cell>
                            <div class="flex space-x-2">
                                <x-popup-modal title="Gallery Image" buttonIcon="eye">
                                    <div class="space-y-4">
                                        <div class="border bg-gray-50">
                                            <img src="{{ $webpUrl }}"
                                                alt="{{ $image->title ?? 'Gallery image' }}"
                                                class="w-full max-h-[70vh] object-contain">
                                        </div>

                                        <div>
                                            <h3 class="text-lg font-semibold text-gray-900">{{ $image->title }}</h3>
                                            <p class="text-sm text-gray-600 mt-2">
                                                {{ $image->description ?: 'No description.' }}
                                            </p>
                                        </div>

                                        <div>
                                            <p class="text-sm font-semibold text-gray-700">Categories</p>
                                            <p class="text-sm text-gray-600">
                                                {{ $image->categories->pluck('name')->join(', ') ?: '—' }}
                                            </p>
                                        </div>

                                        <div class="pt-4 border-t">
                                            <a href="{{ $webpUrl }}" class="btn" title="Download Image"
                                                download>
                                                <i data-lucide="download" class="w-4 h-4 mr-1"></i>
                                                Download
                                            </a>
                                            <x-confirm-modal :action="route('admin.gallery.images.destroy', $image)"
                                                warning="Are you sure you want to delete this image?"
                                                triggerText="Delete" triggerClass="btn-danger">
                                            </x-confirm-modal>
                                        </div>
                                    </div>
                                </x-popup-modal>

                                <x-popup-modal title="Edit Image">
                                    <x-slot:trigger>
                                        <button type="button" class="btn" title="Edit">
                                            <i data-lucide="edit" class="w-4 h-4"></i>
                                        </button>
                                    </x-slot:trigger>

                                    <form action="{{ route('admin.gallery.images.update', $image) }}" method="POST"
                                        enctype="multipart/form-data" class="space-y-4">
                                        @csrf
                                        @method('PUT')
                                        <div class="grid grid-cols-1 sm:grid-cols-[120px,1fr] gap-4 items-start">
                                            <div class="border bg-gray-50 w-28 h-20 flex items-center justify-center">
                                                <img src="{{ $thumbUrl }}"
                                                    alt="{{ $image->title ?? 'Gallery image' }}"
                                                    class="max-h-full max-w-full object-contain">
                                            </div>
                                            <div>
                                                <label class="label">Replace Image</label>
                                                <input type="file" name="photo" class="input"
                                                    accept="image/jpeg,image/png,image/webp">
                                                <p class="text-xs text-gray-500 mt-1">
                                                    Uploading a new file replaces the existing image.
                                                </p>
                                            </div>
                                        </div>

                                        <div>
                                            <label class="label">Title</label>
                                            <input type="text" name="title" class="input"
                                                value="{{ $image->title }}" required>
                                        </div>

                                        <div>
                                            <label class="label">Description</label>
                                            <textarea class="input" rows="4" name="description">{{ $image->description }}</textarea>
                                        </div>

                                        <div>
                                            <label class="label">Categories</label>
                                            @if ($categories->isEmpty())
                                                <p class="text-sm text-gray-500">No categories yet.</p>
                                            @else
                                                <div class="grid grid-cols-2 gap-2">
                                                    @foreach ($categories as $category)
                                                        <label
                                                            class="inline-flex items-center gap-2 text-sm text-gray-700">
                                                            <input type="checkbox" name="categories[]"
                                                                value="{{ $category->id }}"
                                                                class="rounded border-gray-300 text-hw-blue focus:ring-hw-blue"
                                                                @checked($image->categories->contains($category->id))>
                                                            <span>{{ $category->name }}</span>
                                                        </label>
                                                    @endforeach
                                                </div>
                                            @endif
                                        </div>

                                        <div class="flex items-center justify-end gap-3">
                                            <button type="button" class="btn-gray"
                                                @click="open = false">Cancel</button>
                                            <x-loading-button text="Save Changes" class="btn" />
                                        </div>
                                    </form>
                                </x-popup-modal>


                            </div>
                        </x-table.cell>
                    </x-table.row>
                @empty
                    <x-table.row>
                        <x-table.cell colspan="7" class="text-center text-gray-500">
                            No gallery images found.
                        </x-table.cell>
                    </x-table.row>
                @endforelse
            </x-table>

            <div class="text-center p-4">
                {{ $images->links() }}
            </div>
        </div>
    </div>

</x-app-layout>
