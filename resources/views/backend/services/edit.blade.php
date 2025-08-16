<x-app-layout>
    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">

        <div class="bg-white shadow sm:rounded-lg p-6">
            <h2 class="text-2xl font-bold mb-6">Edit Service</h2>

            <!-- Show validation errors -->
            @if ($errors->any())
                <div class="mb-6 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
                    <ul class="list-disc pl-5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('services.update', $service) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Service Name -->
                <div class="mb-4">
                    <label for="name" class="block text-gray-700 font-semibold mb-1">Name</label>
                    <input type="text" name="name" id="name"
                        value="{{ old('name', $service->name) }}"
                        class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-hw-green focus:border-hw-green">
                </div>

                <!-- Description -->
                <div class="mb-4">
                    <label for="desc" class="block text-gray-700 font-semibold mb-1">Short Description</label>
                    <textarea name="desc" id="desc" rows="3"
                        class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-hw-green focus:border-hw-green">{{ old('desc', $service->desc) }}</textarea>
                </div>

                <!-- Icon -->
                <div class="mb-4">
                    <label for="icon" class="block text-gray-700 font-semibold mb-1">Icon (optional)</label>
                    <input type="text" name="icon" id="icon"
                        value="{{ old('icon', $service->icon) }}"
                        class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-hw-green focus:border-hw-green">
                </div>

                <!-- Body (CKEditor) -->
                <div class="mb-4">
                    <label for="body" class="block text-gray-700 font-semibold mb-1">Body</label>
                    <textarea name="body" id="body" rows="6"
                        class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-hw-green focus:border-hw-green">{{ old('body', $service->body) }}</textarea>
                </div>

                <!-- Submit -->
                <div class="flex justify-end mt-6">
                    <a href="{{ route('services.index') }}"
                        class="mr-4 px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition-colors">
                        Cancel
                    </a>
                    <button type="submit"
                        class="px-4 py-2 bg-hw-blue text-white rounded-lg hover:bg-blue-700 transition-colors">
                        Update Service
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- CKEditor 5 -->
    <script src="{{ asset('assets/vendor/ckeditor5/ckeditor.js') }}"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#body'), {
                toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote', 'undo', 'redo']
            })
            .catch(error => {
                console.error(error);
            });
    </script>
</x-app-layout>
