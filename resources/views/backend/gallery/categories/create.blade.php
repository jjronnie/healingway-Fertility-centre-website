<x-app-layout>
    <div class="max-w-4xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
        <div class="bg-white shadow rounded-lg p-6">
            <div class="flex items-center justify-between mb-6">
                <h1 class="text-2xl font-bold text-gray-900">Create Gallery Category</h1>
                <a href="{{ route('admin.gallery.categories.index') }}" class="btn-gray">Back</a>
            </div>

            <form action="{{ route('admin.gallery.categories.store') }}" method="POST" class="space-y-6">
                @csrf

                <div>
                    <label for="name" class="label">Category Name <x-required-mark /></label>
                    <input type="text" name="name" id="name" class="input" value="{{ old('name') }}" required>
                    @error('name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center justify-end gap-3">
                    <a href="{{ route('admin.gallery.categories.index') }}" class="btn-gray">Cancel</a>
                    
                    
                    <x-loading-button text="Create Category" class="btn" />

                </div>
            </form>
        </div>
    </div>
</x-app-layout>
