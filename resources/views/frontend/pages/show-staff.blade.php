<x-guest-layout>
    <section class="max-w-7xl mx-auto p-6 py-24 mt-[80px]">
        <div class=" p-8 md:p-12">
            <div class="flex flex-col md:flex-row items-center md:items-start space-y-8 md:space-y-0 md:space-x-8">
                <!-- Left Column: Photo and Button -->
                <div class="flex-shrink-0 flex flex-col items-center md:items-start w-full md:w-1/3 lg:w-1/4">
                    @if ($staff->photo)
                        <img src="{{ asset($staff->photo) }}" alt="{{ $staff->name }}"
                            class="w-48 h-48 object-cover rounded-full shadow-lg border-4 border-hw-blue mb-6">
                    @else
                        <img src="https://placehold.co/192x192/CCCCCC/FFFFFF?text=No+Photo" alt="No Photo"
                            class="w-48 h-48 object-cover rounded-full shadow-lg border-4 border-hw-blue mb-6">
                    @endif
                    <a href="#" class="btn">
                        <i data-lucide="calendar-range" class="w-4 h-4 mr-2"></i>

                        Book Appointment
                    </a>
                </div>

                <!-- Right Column: staff Information -->
                <div class="text-center md:text-left flex-grow w-full md:w-2/3 lg:w-3/4">
                    <h1 class="text-4xl sm:text-5xl font-extrabold text-gray-900 mb-2 leading-tight">{{ $staff->name }}
                    </h1>
                    <p class="text-xl sm:text-1xl text-blue-600 font-semibold mb-6">{{ $staff->position }}</p>
                    <div class="prose lg:prose-xl text-gray-700 max-w-none">
                        <p>{{ $staff->body ?? 'No detailed information available yet for this staff.' }}</p>
                    </div>
                </div>
            </div>

            <!-- Back to All staff Button -->
            <div class="mt-12 text-center border-t border-gray-200 pt-8">
                <a href="{{ route('our-team') }}" class="btn-gray">
                    <i data-lucide="arrow-left" class="w-4 h-4 mr-2"></i>

                    All staff
                </a>
            </div>
        </div>
    </section>
</x-guest-layout>
