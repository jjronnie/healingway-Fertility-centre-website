<x-guest-layout>

    <x-page-header image="assets/img/1.webp" title="{{ $service->name }}" description="{{ $service->desc }}" />

    <section class="-mt-32 pb-20 relative z-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 bg-white p-8 rounded-2xl shadow-lg">
            <div class="flex flex-col lg:flex-row items-start lg:items-stretch gap-10 md:gap-12">

                {{-- Service Image Section --}}
                @if ($service->photo)
                    <div class="flex-shrink-0 w-full lg:w-1/3 xl:w-1/4 rounded-lg overflow-hidden ">
                        <img src="{{ asset('storage/' . $service->photo) }}" alt="{{ $service->name }}"
                            class="w-full h-auto object-cover rounded-lg transform hover:scale-105 transition-transform duration-300 ease-in-out">
                    </div>
                @else
                    <div class="flex-shrink-0 w-full lg:w-1/3 xl:w-1/4 rounded-lg overflow-hidden ">
                        <img src="{{ asset('assets/img/1.webp') }}" alt="No Service Image"
                            class="w-full h-auto object-cover rounded-lg">
                    </div>
                @endif

                <div class="flex-1 flex flex-col justify-start px-0 lg:px-4">



                    <div class="ck-content">
                        {!! $service->body !!}
                    </div>



                </div>
            </div>
        </div>
    </section>

    <div class="max-w-7xl text-center mx-auto px-4 sm:px-6 lg:px-8 mb-16">
        {{-- Back Link --}}
        <a href="{{ route('our-services') }}" class="btn">
            {{-- Styled back link with consistent blue --}}
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18">
                </path>
            </svg>
            All Services
        </a>
    </div>
</x-guest-layout>
