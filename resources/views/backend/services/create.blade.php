<x-app-layout>
    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm rounded-lg p-6">
                <h2 class="text-2xl font-bold mb-6">Create New Service</h2>

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

                <form action="{{ route('services.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf

                       <div class="grid grid-cols-1 md:grid-cols-2 gap-4 ">

                    {{-- Name --}}
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Name <x-required-mark/> </label>
                        <input type="text" name="name" id="name" required value="{{ old('name') }}"
                            class="w-full px-4 py-2 border @error('name') border-red-500 @else border-gray-300 @enderror rounded-lg focus:ring-2 focus:ring-hw-green focus:border-hw-green">
                        @error('name')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    


                    {{-- Icon --}}
                    <div>
                        <label for="icon" class="block text-sm font-medium text-gray-700 mb-1">Icon
                            </label>
                        <input type="text" name="icon" id="icon" value="{{ old('icon') }}"
                            placeholder=""
                            class="w-full px-4 py-2 border @error('icon') border-red-500 @else border-gray-300 @enderror rounded-lg focus:ring-2 focus:ring-hw-green focus:border-hw-green">
                        <small class="text-gray-500">Use a Lucide class</small>
                        @error('icon')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    </div>

                    {{-- Short Description --}}
                    <div>
                        <label for="desc" class="block text-sm font-medium text-gray-700 mb-1">Short
                            Description <x-required-mark/> </label>
                        <textarea name="desc" required id="desc" rows="3"
                            class="w-full px-4 py-2 border @error('desc') border-red-500 @else border-gray-300 @enderror rounded-lg focus:ring-2 focus:ring-hw-green focus:border-hw-green">{{ old('desc') }}</textarea>
                        @error('desc')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Body (CKEditor) --}}
                    <div>
                        <label for="body" class="block text-sm font-medium text-gray-700 mb-1">Body</label>
                        <textarea name="body" id="body"  rows="6"
                            class="w-full px-4 py-2 border @error('body') border-red-500 @else border-gray-300 @enderror rounded-lg focus:ring-2 focus:ring-hw-green focus:border-hw-green">{{ old('body') }}</textarea>
                        @error('body')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>


                    <x-image-upload name="photo" label="Featured Image" />



                     <div>
                        <input type="hidden" name="is_featured" value="0">
                        <label class="inline-flex items-center gap-2">
                            <input type="checkbox" name="is_featured" value="1"
                                class="rounded border-gray-300 text-hw-blue focus:ring-hw-blue"
                                {{ old('is_featured') ? 'checked' : '' }}>
                            <span>Add to Featured services</span>
                        </label>
                    </div>


                    {{-- Submit --}}
                    <div>
                        <button type="submit"
                            class="btn">
                            Create Service
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
                    'heading', '|', 'bold', 'italic', 'link',
                    'bulletedList', 'numberedList', 'blockQuote',
                    '|', 'undo', 'redo'
                ],
            })
            .catch(error => console.error(error));
    </script>
</x-app-layout>
