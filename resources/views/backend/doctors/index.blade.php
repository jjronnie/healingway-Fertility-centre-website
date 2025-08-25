<x-app-layout>
  <div class="max-w-full mx-auto  p-8">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold text-gray-800">Manage Doctors</h1>
            <a href="{{ route('admin.doctors.create') }}"
               class="px-5 py-2 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition duration-200">
                Add New Doctor
            </a>
        </div>

        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg relative mb-6" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        <div class="overflow-x-auto rounded-lg shadow-md">
            <table class="min-w-full leading-normal">
                <thead>
                    <tr class="bg-gray-200 text-left text-gray-600 uppercase text-sm font-semibold tracking-wider">
                        <th class="px-6 py-3 border-b-2 border-gray-300">Photo</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300">Name</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300">Position</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300">Display Order</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($doctors as $doctor)
                        <tr class="bg-white border-b border-gray-200 hover:bg-gray-50">
                            <td class="px-6 py-4 text-sm text-gray-900">
                                @if ($doctor->photo)
                                    <img src="{{ asset($doctor->photo) }}" alt="{{ $doctor->name }}" class="w-12 h-12 object-cover rounded-full">
                                @else
                                    <img src="https://placehold.co/48x48/CCCCCC/FFFFFF?text=No+Photo" alt="No Photo" class="w-12 h-12 object-cover rounded-full">
                                @endif
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-900">{{ $doctor->name }}</td>
                            <td class="px-6 py-4 text-sm text-gray-900">{{ $doctor->position }}</td>
                             <td class="px-6 py-4 text-sm text-gray-900">{{ $doctor->display_position }}</td>
                            <td class="px-6 py-4 text-sm text-gray-900 flex items-center justify-center space-x-2">
                                <a href="{{ route('admin.doctors.show', $doctor) }}"
                                   class="text-blue-600 hover:text-blue-900 text-lg">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                                </a>
                                <a href="{{ route('admin.doctors.edit', $doctor) }}"
                                   class="text-yellow-600 hover:text-yellow-900 text-lg">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                </a>
                                <form action="{{ route('admin.doctors.destroy', $doctor) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this doctor?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900 text-lg">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-4 text-sm text-gray-500 text-center">No doctors found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="mt-6">
            {{ $doctors->links() }}
        </div>
    </div>
</x-app-layout>
