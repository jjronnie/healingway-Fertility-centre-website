<x-guest-layout>

    <x-page-header image="assets/img/1.webp" title=" " description=" " />

    <section class="-mt-32 pb-20 relative z-10">
        <div class="max-w-7xl mx-auto px-4">
            <div class="bg-white rounded-2xl shadow-lg p-8 md:p-12">

                <!-- Service Header -->
                <div class="mb-10">
                    <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-3">{{ $service->name }}</h1>
                    <p class="text-lg text-gray-600 leading-relaxed">{{ $service->desc }}</p>
                    <div class="h-1 w-20 bg-hw-blue rounded mt-4"></div>
                </div>

                <!-- Service Content Grid -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8 md:gap-10">

                    <!-- Service Image Section -->
                    <div class="md:col-span-1">
                        @if ($service->photo)
                            <img src="{{ asset('storage/' . $service->photo) }}" alt="{{ $service->name }}"
                                class="w-full h-80 object-cover rounded-xl shadow-lg border-4 border-hw-blue transform hover:scale-105 transition-transform duration-300">
                        @else
                            <img src="{{ asset('assets/img/1.webp') }}" alt="No Service Image"
                                class="w-full h-80 object-cover rounded-xl shadow-lg border-4 border-hw-blue">
                        @endif
                    </div>

                    <!-- Service Details Section -->
                    <div class="md:col-span-2">
                        <div class="ck-content prose prose-sm max-w-none text-gray-700">
                            {!! $service->body !!}
                        </div>
                    </div>
                </div>

                <!-- Action Section -->
                <div class="mt-12 border-t border-gray-200 pt-8">
                    <div class="flex flex-col sm:flex-row gap-4 justify-center sm:justify-start">
                        <a href="{{ route('our-services') }}" class="btn-gray inline-flex items-center justify-center">
                            <i data-lucide="arrow-left" class="w-4 h-4 mr-2"></i>
                            Back to Services
                        </a>
                        <a href="{{ route('user.appointments.create') }}" class="btn inline-flex items-center justify-center">
                            <i data-lucide="calendar" class="w-4 h-4 mr-2"></i>
                            Book Now
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-guest-layout>
