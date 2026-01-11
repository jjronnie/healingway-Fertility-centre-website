<x-app-layout>
    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm rounded-lg p-6">
                <h2 class="text-2xl font-bold mb-6">Add New staff</h2>

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


                <form action="{{ route('admin.staff.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-4">
                        <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Name:</label>
                        <input type="text" name="name" id="name" value="{{ old('name') }}"
                            class="shadow appearance-none border rounded-lg w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-blue-500 transition duration-200"
                            placeholder="staff's Full Name" required>
                    </div>
                    <div class="mb-4">
                        <label for="position" class="block text-gray-700 text-sm font-bold mb-2">Position:</label>
                        <input type="text" name="position" id="position" value="{{ old('position') }}"
                            class="shadow appearance-none border rounded-lg w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-blue-500 transition duration-200"
                            placeholder="e.g., Head Fertility, Senior Physician">
                    </div>

                     <div class="mb-4">
                <label for="display_position" class="block text-gray-700 text-sm font-bold mb-2">Display Order:</label>
                <input type="number" name="display_position" id="display_position" value="{{ old('display_position', 0) }}"
                       class="shadow appearance-none border rounded-lg w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-blue-500 transition duration-200"
                       placeholder="Enter a number to order staff (e.g., 0 for first)">
                <p class="mt-1 text-sm text-gray-500">Lower numbers will appear first.</p>
            </div>
            
                    <div class="mb-4">
                        <label for="body" class="block text-gray-700 text-sm font-bold mb-2">Body
                            (Information):</label>
                        <textarea name="body" id="body" rows="6"
                            class="shadow appearance-none border rounded-lg w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-blue-500 transition duration-200"
                            placeholder="Detailed information about the staff...">{{ old('body') }}</textarea>
                    </div>
                    <div class="mb-6">
                        <label for="photo" class="block text-gray-700 text-sm font-bold mb-2">Photo:</label>
                        <input type="file" name="photo" id="photo"
                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                        <p class="mt-1 text-sm text-gray-500">PNG, JPG, JPEG, GIF, SVG (Max 2MB)</p>
                    </div>
                    <div class="flex items-center justify-between">
                        <button type="submit"
                            class="bg-green-600 hover:bg-green-700 text-white font-bold py-3 px-6 rounded-lg focus:outline-none focus:shadow-outline transition duration-200">
                            Add staff
                        </button>
                        <a href="{{ route('admin.staff.index') }}"
                            class="inline-block align-baseline font-bold text-sm text-blue-600 hover:text-blue-800">
                            Cancel
                        </a>
                    </div>
                </form>


            </div>
        </div>
    </div>


</x-app-layout>
