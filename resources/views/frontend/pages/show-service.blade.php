<x-guest-layout>
    <div class="max-w-7xl mx-auto p-6 py-12 md:py-20 mt-[80px] ">
        <div class="flex flex-col lg:flex-row items-start lg:items-stretch gap-10 md:gap-12"> {{-- Increased gap for better spacing --}}

            {{-- Service Image Section --}}
            @if ($service->photo)
                <div class="flex-shrink-0 w-full lg:w-1/3 xl:w-1/4 rounded-lg overflow-hidden ">
                    <img src="{{ asset('storage/' . $service->photo) }}" alt="{{ $service->name }}"
                        class="w-full h-auto object-cover rounded-lg transform hover:scale-105 transition-transform duration-300 ease-in-out">
                </div>
            @else

             <div class="flex-shrink-0 w-full lg:w-1/3 xl:w-1/4 rounded-lg overflow-hidden ">
                    <img src="{{asset('assets/img/1.webp')}}" alt="No Service Image"
                        class="w-full h-auto object-cover rounded-lg">
                </div>
                {{-- <div class="flex-shrink-0 w-full lg:w-1/3 xl:w-1/4 rounded-lg overflow-hidden ">
                    <img src="https://placehold.co/600x400/CCCCCC/FFFFFF?text=No+Service+Image" alt="No Service Image"
                        class="w-full h-auto object-cover rounded-lg">
                </div> --}}
            @endif

            {{-- Service Content Section --}}
            <div class="flex-1 flex flex-col justify-start px-0 lg:px-4"> {{-- Added some horizontal padding for larger screens --}}
                {{-- Service Title --}}
                <h1 class="text-3xl sm:text-4xl font-extrabold text-hw-blue leading-tight mb-4 md:mb-6">
                    {{ $service->name }}
                </h1>

                {{-- Service Description (Lead paragraph) --}}
                @if ($service->desc)
                    <p
                        class="text-lg md:text-xl text-gray-700 leading-relaxed mb-6 md:mb-8 font-medium border-l-4 border-hw-blue pl-4 italic">
                        {{-- Styled as a subtle quote/intro --}}
                        {{ $service->desc }}
                    </p>
                @endif


                <div class="ck-content">
                    {!! $service->body !!}
                </div>


                {{-- Back Link --}}
                <a href="{{ route('our-services') }}"
                    class="inline-flex items-center text-hw-blue font-semibold hover:text-blue-800 transition-colors duration-200 mt-auto pt-6 border-t border-gray-200">
                    {{-- Styled back link with consistent blue --}}
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    All Services
                </a>
            </div>
        </div>
    </div>
</x-guest-layout>
