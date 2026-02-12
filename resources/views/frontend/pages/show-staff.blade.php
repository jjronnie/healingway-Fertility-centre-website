<x-guest-layout>
    <x-page-header image="assets/img/3.webp" title="" description=" " />

    <section class="-mt-32 pb-20 relative z-10">
        <div class="max-w-5xl mx-auto px-4">
            <div class="bg-white rounded-2xl shadow-lg p-8 md:p-12">

                <!-- Main Content Grid -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8 md:gap-10">

                    <!-- Left Column: Photo -->
                    <div class="md:col-span-1 flex flex-col items-center">
                        @php
                            $staffImage = $staff->getFirstMediaUrl('photo', 'webp')
                                ?: ($staff->photo ? asset('storage/' . $staff->photo) : 'https://placehold.co/400x320/CCCCCC/FFFFFF?text=No+Photo');
                        @endphp
                        <img src="{{ $staffImage }}" alt="{{ $staff->name ?? 'No Photo' }}"
                            class="w-full max-w-sm h-80 object-cover rounded-xl shadow-lg border-4 border-hw-blue mb-6">

                        
                    </div>

                    <!-- Right Column: Staff Information -->
                    <div class="md:col-span-2 flex flex-col justify-start">
                        <!-- Header Info -->
                        <div class="mb-8">
                            <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-2">{{ $staff->name }}</h1>
                            <p class="text-2xl text-hw-blue font-semibold">{{ $staff->position }}</p>
                            <div class="h-1 w-20 bg-hw-blue rounded mt-4"></div>
                        </div>

                        <!-- Bio Section -->
                      

                        <div class="md:col-span-2">
                            <h2 class="text-lg font-semibold text-gray-800 mb-4">About</h2>

                            <div class="ck-content prose prose-sm max-w-none text-gray-700">
                                {!! $staff->body !!}
                            </div>
                        </div>

                        <!-- Additional Info Section (if needed) -->
                        {{-- <div class="bg-gray-50 rounded-lg p-6 mt-auto">
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                                <div>
                                    <p class="text-sm font-medium text-gray-600 uppercase tracking-wide">Position</p>
                                    <p class="text-gray-900 font-semibold mt-1">{{ $staff->position ?? 'Not specified' }}</p>
                                </div>
                                <div>
                                    <p class="text-sm font-medium text-gray-600 uppercase tracking-wide">Specialization</p>
                                    <p class="text-gray-900 font-semibold mt-1">Fertility & Wellness</p>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>

                <!-- Back Button -->
                <div class="mt-12 text-center border-t border-gray-200 pt-8">
                    <a href="{{ route('our-team') }}" class="btn-gray inline-flex items-center">
                        <i data-lucide="arrow-left" class="w-4 h-4 mr-2"></i>
                        Back to Our Team
                    </a>
                </div>
            </div>
        </div>
    </section>
</x-guest-layout>
