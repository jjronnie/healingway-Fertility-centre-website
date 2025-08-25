<x-app-layout>
    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm rounded-lg p-6">
                <h2 class="text-2xl font-bold mb-6">Edit Service</h2>

                {{-- Global error list --}}
                @if ($errors->any())
                    <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
                        <ul class="list-disc pl-5">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('services.update', $service->slug) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf
                    @method('PUT')

                    {{-- Name --}}
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Name</label>
                        <input type="text" name="name" id="name"
                               value="{{ old('name', $service->name) }}"
                               class="w-full px-4 py-2 border @error('name') border-red-500 @else  @enderror rounded-lg focus:ring-2 focus:ring-hw-green focus:border-hw-green">
                        @error('name')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

           

                    {{-- Icon --}}
                    <div>
                        <label for="icon" class="block text-sm font-medium text-gray-700 mb-1">Icon (optional)</label>
                        <input type="text" name="icon" id="icon"
                               value="{{ old('icon', $service->icon) }}"
                               placeholder="e.g. fas fa-heart or lucide:activity"
                               class="w-full px-4 py-2 border @error('icon') border-red-500 @else  @enderror rounded-lg focus:ring-2 focus:ring-hw-green focus:border-hw-green">
                        <small class="text-gray-500">Use a Lucide or FontAwesome class</small>
                        @error('icon')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Short Description --}}
                    <div>
                        <label for="desc" class="block text-sm font-medium text-gray-700 mb-1">Short Description</label>
                        <textarea name="desc" id="desc" rows="3"
                                  class="w-full px-4 py-2 border @error('desc') border-red-500 @else  @enderror rounded-lg focus:ring-2 focus:ring-hw-green focus:border-hw-green">{{ old('desc', $service->desc) }}</textarea>
                        @error('desc')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Body (CKEditor) --}}
                    <div>
                        <label for="body" class="block text-sm font-medium text-gray-700 mb-1">Body</label>
                        <textarea name="body" id="body" rows="6"
                                  class="w-full px-4 py-2 border @error('body') border-red-500 @else  @enderror rounded-lg focus:ring-2 focus:ring-hw-green focus:border-hw-green">{{ old('body', $service->body) }}</textarea>
                        @error('body')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Photo --}}
                    <div>
                        <label for="photo" class="block text-sm font-medium text-gray-700 mb-1">Service Image (optional)</label>
                        @if ($service->photo)
                            <div class="mb-3">
                                <img src="{{ asset('storage/' . $service->photo) }}" alt="Current Service Image" class="h-32 rounded-md shadow">
                            </div>
                        @endif
                        <input type="file" name="photo" id="photo"
                               class="w-full px-4 py-2 border @error('photo') border-red-500 @else  @enderror rounded-lg focus:ring-2 focus:ring-hw-green focus:border-hw-green">
                        @error('photo')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Submit --}}
                    <div>
                        <button type="submit"
                                class="bg-hw-blue text-white px-6 py-3 rounded-lg font-semibold hover:bg-hw-green transition-colors w-full sm:w-auto">
                            Update Service
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- CKEditor --}}
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#body'), {
                toolbar: [
                    'heading','|','bold','italic','link',
                    'bulletedList','numberedList','blockQuote',
                    '|','undo','redo'
                ],
            })
            .catch(error => console.error(error));
    </script>
</x-app-layout>
