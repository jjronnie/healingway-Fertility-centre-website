<x-app-layout>
    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm rounded-lg p-6">
                <h2 class="text-2xl font-bold mb-6">Create New Service</h2>

                @if ($errors->any())
                    <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
                        <ul class="list-disc pl-5">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('services.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <!-- Title -->
                    <div class="mb-4">
                        <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Title</label>
                        <input type="text" name="title" id="title"
                               value="{{ old('title') }}"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-hw-green focus:border-hw-green">
                    </div>

                    <!-- Slug -->
                    <div class="mb-4">
                        <label for="slug" class="block text-sm font-medium text-gray-700 mb-1">Slug</label>
                        <input type="text" name="slug" id="slug"
                               value="{{ old('slug') }}"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-hw-green focus:border-hw-green">
                        <small class="text-gray-500">Unique URL-friendly identifier</small>
                    </div>

                    <!-- Icon -->
                    <div class="mb-4">
                        <label for="icon" class="block text-sm font-medium text-gray-700 mb-1">Icon (optional)</label>
                        <input type="text" name="icon" id="icon"
                               value="{{ old('icon') }}"
                               placeholder="e.g. fas fa-heart or lucide icon class"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-hw-green focus:border-hw-green">
                        <small class="text-gray-500">Use a Lucide or FontAwesome class, leave empty for static image</small>
                    </div>

                    <!-- Description -->
                    <div class="mb-4">
                        <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Short Description</label>
                        <textarea name="description" id="description" rows="3"
                                  class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-hw-green focus:border-hw-green">{{ old('description') }}</textarea>
                    </div>

                    <!-- Body (CKEditor) -->
                    <div class="mb-4">
                        <label for="body" class="block text-sm font-medium text-gray-700 mb-1">Body</label>
                        <textarea name="body" id="body" rows="6"
                                  class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-hw-green focus:border-hw-green">{{ old('body') }}</textarea>
                    </div>

                    <!-- Image Upload (Optional) -->
                    <div class="mb-4">
                        <label for="image" class="block text-sm font-medium text-gray-700 mb-1">Service Image (optional)</label>
                        <input type="file" name="image" id="image"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-hw-green focus:border-hw-green">
                    </div>

                    <button type="submit"
                            class="bg-hw-blue text-white px-6 py-3 rounded-lg font-semibold hover:bg-green-600 transition-colors">
                        Create Service
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- CKEditor -->
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#body'), {
                toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote', '|', 'undo', 'redo'],
            })
            .catch(error => console.error(error));
    </script>
</x-app-layout>
