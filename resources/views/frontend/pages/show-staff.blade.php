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
                    <a href="#" {{-- Replace # with your actual booking link --}}
                       class="inline-flex items-center justify-center px-6 py-3 bg-hw-blue text-white font-semibold rounded-full
                              hover:bg-blue-700 transition duration-300 shadow-md text-center w-full md:w-auto">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        Book Appointment
                    </a>
                </div>

                <!-- Right Column: staff Information -->
                <div class="text-center md:text-left flex-grow w-full md:w-2/3 lg:w-3/4">
                    <h1 class="text-4xl sm:text-5xl font-extrabold text-gray-900 mb-2 leading-tight">{{ $staff->name }}</h1>
                    <p class="text-xl sm:text-1xl text-blue-600 font-semibold mb-6">{{ $staff->position }}</p>
                    <div class="prose lg:prose-xl text-gray-700 max-w-none">
                        <p>{{ $staff->body ?? 'No detailed information available yet for this staff.' }}</p>
                    </div>
                </div>
            </div>

            <!-- Back to All staff Button -->
            <div class="mt-12 text-center border-t border-gray-200 pt-8">
                <a href="{{ route('our-team') }}"
                   class="inline-flex items-center px-8 py-4 bg-gray-200 text-gray-800 font-semibold rounded-full
                          hover:bg-gray-300 transition duration-200 shadow-md">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                    All staff
                </a>
            </div>
        </div>
    </section>
</x-guest-layout>
