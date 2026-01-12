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

                <form action="{{ route('services.update', $service->slug) }}" method="POST" enctype="multipart/form-data"
                    class="space-y-6">
                    @csrf
                    @method('PUT')

                    {{-- Name --}}
                    <div>
                        <label for="name" class="label">Name</label>
                        <input type="text" name="name" id="name" value="{{ old('name', $service->name) }}"
                            class="w-full input px-4 py-2 border @error('name') border-red-500 @else  @enderror rounded-lg focus:ring-2 focus:ring-hw-green focus:border-hw-green">
                        @error('name')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>



                    {{-- Icon --}}
                    <div>
                        <label for="icon" class="label">Icon (optional)</label>
                        <input type="text" name="icon" id="icon" value="{{ old('icon', $service->icon) }}"
                            placeholder="e.g. fas fa-heart or lucide:activity"
                            class="w-full input px-4 py-2 border @error('icon') border-red-500 @else  @enderror rounded-lg focus:ring-2 focus:ring-hw-green focus:border-hw-green">
                        <small class="text-gray-500">Use a Lucide or FontAwesome class</small>
                        @error('icon')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Short Description --}}
                    <div>
                        <label for="desc" class="label">Short Description</label>
                        <textarea name="desc" id="desc" rows="3"
                            class="w-full input px-4 py-2 border @error('desc') border-red-500 @else  @enderror rounded-lg focus:ring-2 focus:ring-hw-green focus:border-hw-green">{{ old('desc', $service->desc) }}</textarea>
                        @error('desc')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>



                    {{-- Body (CKEditor) --}}
                    <div>
                        <label for="body" class="label">Body</label>
                        <textarea name="body" id="body"
                            class="w-full border rounded-lg focus:ring-2 focus:ring-hw-green focus:border-hw-green">{{ old('body', $service->body) }}</textarea>

                        @error('body')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Featured Image --}}
                    <x-image-upload name="photo" label="Featured Image" :preview="$service->photo ? 'storage/' . $service->photo : null" />


                    {{-- Submit --}}
                    <div>
                        <button type="submit" class="btn">
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
        ClassicEditor.create(document.querySelector('#body'), {
            heading: {
                options: [{
                        model: 'paragraph',
                        title: 'Paragraph',
                        class: 'ck-heading_paragraph'
                    },
                    {
                        model: 'heading1',
                        view: 'h1',
                        title: 'Heading 1'
                    },
                    {
                        model: 'heading2',
                        view: 'h2',
                        title: 'Heading 2'
                    },
                    {
                        model: 'heading3',
                        view: 'h3',
                        title: 'Heading 3'
                    },
                ]
            },
            toolbar: {
                items: [
                    'heading',
                    '|',
                    'bold', 'italic', 'link',
                    'bulletedList', 'numberedList',
                    'blockQuote',
                    '|',
                    'undo', 'redo'
                ]
            }
        });
    </script>


</x-app-layout>
