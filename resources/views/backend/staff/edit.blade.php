<x-app-layout>
  <div class="max-w-4xl mx-auto bg-white rounded-lg shadow-xl p-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-6 text-center">Edit staff: <span class="text-blue-600">{{ $staff->name }}</span></h1>

        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg relative mb-6" role="alert">
                <strong class="font-bold">Whoops!</strong>
                <span class="block sm:inline">There were some problems with your input.</span>
                <ul class="mt-3 list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.staff.update', $staff) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Name:</label>
                <input type="text" name="name" id="name" value="{{ old('name', $staff->name) }}"
                       class="shadow appearance-none border rounded-lg w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-blue-500 transition duration-200"
                       placeholder="staff's Full Name" required>
            </div>
            <div class="mb-4">
                <label for="position" class="block text-gray-700 text-sm font-bold mb-2">Position:</label>
                <input type="text" name="position" id="position" value="{{ old('position', $staff->position) }}"
                       class="shadow appearance-none border rounded-lg w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-blue-500 transition duration-200"
                       placeholder="e.g., Head Fertility, Senior Physician">
            </div>
            <div class="mb-4">
                <label for="body" class="block text-gray-700 text-sm font-bold mb-2">Body (Information):</label>
                <textarea name="body" id="body" rows="6"
                          class="shadow appearance-none border rounded-lg w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-blue-500 transition duration-200"
                          placeholder="Detailed information about the staff...">{{ old('body', $staff->body) }}</textarea>
            </div>

              <div class="mb-4">
                <label for="display_position" class="block text-gray-700 text-sm font-bold mb-2">Display Order:</label>
                <input type="number" name="display_position" id="display_position" value="{{ old('display_position', $staff->display_position ?? 0) }}"
                       class="shadow appearance-none border rounded-lg w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-blue-500 transition duration-200"
                       placeholder="Enter a number to order staff (e.g., 0 for first)">
                <p class="mt-1 text-sm text-gray-500">Lower numbers will appear first.</p>
            </div>
            
            <div class="mb-6">
                <label for="photo" class="block text-gray-700 text-sm font-bold mb-2">Photo:</label>
                @if ($staff->photo)
                    <img src="{{ asset($staff->photo) }}" alt="{{ $staff->name }}" class="w-24 h-24 object-cover rounded-full mb-3 shadow-md">
                    <p class="text-sm text-gray-600 mb-2">Current Photo</p>
                @endif
                <input type="file" name="photo" id="photo"
                       class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                <p class="mt-1 text-sm text-gray-500">Leave blank to keep current photo. PNG, JPG, JPEG, GIF, SVG (Max 2MB)</p>
            </div>
            <div class="flex items-center justify-between">
                <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-lg focus:outline-none focus:shadow-outline transition duration-200">
                    Update staff
                </button>
                <a href="{{ route('admin.staff.index') }}"
                   class="inline-block align-baseline font-bold text-sm text-gray-600 hover:text-gray-800">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</x-app-layout>
