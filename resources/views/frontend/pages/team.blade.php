<x-guest-layout>

    {{-- nav --}}
    {{-- @include('frontend.layouts.page-title') --}}


    <section class="max-w-7xl mx-auto p-6 py-24 mt-[80px]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Section Heading -->
            <h2 class="text-4xl font-extrabold text-center bg-clip-text text-transparent bg-hw-gradient mb-10">Meet Our Expert Team</h2>
            <p class="text-lg text-center text-gray-600 mb-12 max-w-2xl mx-auto">
                Our experienced and compassionate medical professionals are committed to providing the highest quality
                care. Get to know the experts who will be looking after you.
            </p>

            <!-- staff Cards Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">

                @foreach ($staff as $staff)

                <!-- staff Card 1 -->
                <a href="{{ route('staff.show', $staff->slug) }}">
                <div
                    class="flex flex-col bg-white shadow-lg overflow-hidden transform hover:scale-105 transition-transform duration-300 ease-in-out h-full">
                    <div class="relative w-full h-60 overflow-hidden ">
                        <img src="{{ asset($staff->photo ?: 'https://placehold.co/600x400/CCCCCC/FFFFFF?text=No+Photo') }}"
                                 alt="{{ $staff->name }}" 
                            class="object-cover w-full h-full">
                    </div>
                    <div class="p-6 flex flex-col justify-between flex-grow">
                        <div>
                            <p class="text-md text-gray-600 text-center mb-4">{{ $staff->position }}</p>
                            <h3 class="text-xl font-bold text-center text-gray-800 mb-1">{{ $staff->name }}</h3>
                            
                        </div>
                    </div>
                </div>
                </a>
                 @endforeach

            </div>


        </div>
    </section>





</x-guest-layout>
