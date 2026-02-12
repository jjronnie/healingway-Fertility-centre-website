<x-app-layout>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white rounded-lg p-6">
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

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 ">

                        <div class="mb-4">
                            <label for="name" class="label">Name: <x-required-mark /> </label>
                            <input type="text" name="name" id="name" value="{{ old('name') }}"
                                class="label input" placeholder="Enter Full Name" required>
                        </div>

                        <div class="mb-4">
                            <label for="position" class="label">
                                Position: <x-required-mark />
                            </label>
                            <input type="text" name="position" required id="position" value="{{ old('position') }}"
                                class="input" placeholder="e.g., Head Fertility, Senior Physician">
                        </div>

                        <div class="mb-4">
                            <label for="display_position" class="label">
                                Display
                                Order no.:
                            </label>
                            <input type="number" name="display_position" id="display_position"
                                value="{{ old('display_position', 0) }}" class="input"
                                placeholder="Enter a number to order staff (e.g., 0 for first)">
                            <p class="mt-1 text-sm text-gray-500">Lower numbers will appear first.</p>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="body" class="label">Profile
                            Information:</label>
                        <textarea name="body" id="body" rows="6" class="input"
                            placeholder="Detailed information about the staff...">{{ old('body') }}</textarea>
                    </div>

                    <x-image-upload name="photo" label="Photo" />


                    {{-- Actions --}}
                    <div class="flex justify-start gap-3 pt-4 border-t">
                        <a href="{{ route('admin.staff.index') }}" class="btn-gray">
                            Cancel
                        </a>
                        <x-loading-button text="Create" class="btn" />
                    </div>




                </form>


            </div>
        </div>
    </div>


</x-app-layout>
