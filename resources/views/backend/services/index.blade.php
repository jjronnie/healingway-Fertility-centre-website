<x-app-layout>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold text-gray-900">Services</h2>
                <a href="{{ route('services.create') }}"
                   class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600 transition-colors">
                    Add New Service
                </a>
            </div>

            <div class="bg-white shadow-sm rounded-lg overflow-hidden">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">#</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Slug</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Description</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($services as $service)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $service->id }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $service->title }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $service->slug }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $service->description }}</td>
                            <td class="px-6 py-4 whitespace-nowrap flex space-x-2">
                                <a href="{{ route('services.show', $service->id) }}"
                                   class="text-blue-500 hover:underline">View</a>
                                <a href="{{ route('services.edit', $service->id) }}"
                                   class="text-yellow-500 hover:underline">Edit</a>
                                <form action="{{ route('services.destroy', $service->id) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:underline">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        @if($services->isEmpty())
                        <tr>
                            <td colspan="5" class="px-6 py-4 text-center text-gray-500">No services found.</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
