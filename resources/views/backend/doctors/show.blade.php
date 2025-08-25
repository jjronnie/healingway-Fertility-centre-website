<x-app-layout>

<body class="bg-gray-100 p-8">
    <div class="max-w-4xl mx-auto  p-8">
        <div class="text-center mb-6">
            @if ($doctor->photo)
                <img src="{{ asset($doctor->photo) }}" alt="{{ $doctor->name }}" class="w-40 h-40 object-cover rounded-full mx-auto mb-4 shadow-lg">
            @else
                <img src="https://placehold.co/160x160/CCCCCC/FFFFFF?text=No+Photo" alt="No Photo" class="w-40 h-40 object-cover rounded-full mx-auto mb-4 shadow-lg">
            @endif
            <h1 class="text-4xl font-extrabold text-gray-900 mb-2">{{ $doctor->name }}</h1>
            <p class="text-xl text-blue-600 mb-4">{{ $doctor->position }}</p>
        </div>

        <div class="border-t border-gray-200 pt-6">
            <h2 class="text-2xl font-bold text-gray-800 mb-3">About Dr. {{ explode(' ', $doctor->name)[0] }}</h2>
            <p class="text-gray-700 leading-relaxed text-lg mb-4">
                {{ $doctor->body ?? 'No detailed information available yet.' }}
            </p>
            <p class="text-gray-500 text-sm mt-6">
                <strong>Slug:</strong> {{ $doctor->slug }}
            </p>
        </div>

        <div class="flex justify-center mt-8 space-x-4">
            <a href="{{ route('admin.doctors.edit', $doctor) }}"
               class="px-6 py-3 bg-yellow-500 text-white font-semibold rounded-lg hover:bg-yellow-600 transition duration-200">
                Edit Doctor
            </a>
            <a href="{{ route('admin.doctors.index') }}"
               class="px-6 py-3 bg-gray-300 text-gray-800 font-semibold rounded-lg hover:bg-gray-400 transition duration-200">
                Back to List
            </a>
        </div>
    </div>
    
</x-app-layout>