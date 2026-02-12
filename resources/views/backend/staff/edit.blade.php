<x-app-layout>
    <div class="max-w-7xl mx-auto bg-white rounded-lg shadow-xl p-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-6 text-center">Edit staff: <span
                class="text-blue-600">{{ $staff->name }}</span></h1>

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

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 ">

                <div class="mb-4">
                    <label for="name" class="label">Name: </label>
                    <input type="text" name="name" id="name" value="{{ old('name', $staff->name) }}"
                        class="input" placeholder="staff's Full Name" required>
                </div>
                <div class="mb-4">
                    <label for="position" class="label">Position:</label>
                    <input type="text" name="position" id="position" value="{{ old('position', $staff->position) }}"
                        class="input" placeholder="e.g., Head Fertility, Senior Physician">
                </div>


                <div class="mb-4">
                    <label for="display_position" class="label">Display
                        Order:</label>
                    <input type="number" name="display_position" id="display_position"
                        value="{{ old('display_position', $staff->display_position ?? 0) }}" class="input"
                        placeholder="Enter a number to order staff (e.g., 0 for first)">
                    <p class="mt-1 text-sm text-gray-500">Lower numbers will appear first.</p>
                </div>
            </div>


            @php
                $staffPreview =
                    $staff->getFirstMediaUrl('photo', 'webp') ?: ($staff->photo ? 'storage/' . $staff->photo : null);
            @endphp

            <x-image-upload name="photo" label="Featured Image" :preview="$staffPreview" />





            <div class="mb-4">
                <label for="body" class="label">Body (Information):</label>
                <textarea name="body" id="body" rows="6" class="input p-4"
                    placeholder="Detailed information about the staff...">{{ old('body', $staff->body) }}</textarea>
            </div>


            

            <div class="flex justify-start gap-3 pt-4 border-t">
                <a href="{{ route('admin.staff.index') }}" class="btn-gray">
                    Cancel
                </a>
                <x-loading-button text="Update" class="btn" />
            </div>
        </form>
    </div>
</x-app-layout>
