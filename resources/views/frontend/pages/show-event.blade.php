<x-guest-layout>

    <x-page-header title=" " description="" />

    <!-- Event Detail Section -->
    <section class="-mt-32 pb-20 relative z-10">
        <div class="max-w-5xl mx-auto px-4">
            <div class="bg-white rounded-2xl shadow-lg p-8 md:p-12">

                <!-- Event Header -->
                <div class="mb-10">
                    <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-3">{{ $event->title }}</h1>
                    <p class="text-lg text-gray-600 leading-relaxed">{{ $event->summary }}</p>
                    <div class="h-1 w-20 bg-hw-blue rounded mt-4"></div>
                </div>

                <!-- Event Meta Information -->
                <div class="bg-blue-50 rounded-xl p-6 mb-10 border border-blue-200">
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        <div class="flex items-start gap-3">
                            <div class="w-10 h-10 bg-hw-blue rounded-lg flex items-center justify-center flex-shrink-0 mt-1">
                                <i data-lucide="calendar" class="w-5 h-5 text-white"></i>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-600">Date</p>
                                <p class="text-lg font-semibold text-gray-900">{{ $event->formatted_date }}</p>
                            </div>
                        </div>

                        <div class="flex items-start gap-3">
                            <div class="w-10 h-10 bg-hw-blue rounded-lg flex items-center justify-center flex-shrink-0 mt-1">
                                <i data-lucide="clock" class="w-5 h-5 text-white"></i>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-600">Time</p>
                                <p class="text-lg font-semibold text-gray-900">
                                    @if ($event->event_time && $event->end_time)
                                        {{ $event->formatted_time }} - {{ $event->formatted_end_time }}
                                    @elseif ($event->event_time)
                                        {{ $event->formatted_time }}
                                    @else
                                        TBA
                                    @endif
                                </p>
                            </div>
                        </div>

                        <div class="flex items-start gap-3">
                            <div class="w-10 h-10 bg-hw-blue rounded-lg flex items-center justify-center flex-shrink-0 mt-1">
                                <i data-lucide="map-pin" class="w-5 h-5 text-white"></i>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-600">Location</p>
                                <p class="text-lg font-semibold text-gray-900">{{ $event->venue ?? 'TBA' }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Event Content Grid -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8 md:gap-10 mb-10">

                    <!-- Event Image Section -->
                    <div class="md:col-span-1">
                        @if ($event->featured_image)
                            <img src="{{ asset('storage/' . $event->featured_image) }}" alt="{{ $event->title }}"
                                class="w-full h-80 object-cover rounded-xl shadow-lg border-4 border-hw-blue">
                        @else
                            <img src="{{ asset('assets/img/1.webp') }}" alt="No Event Image"
                                class="w-full h-80 object-cover rounded-xl shadow-lg border-4 border-hw-blue">
                        @endif
                    </div>

                    <!-- Event Details Section -->
                   

                     <div class="md:col-span-2">
                            <h2 class="text-lg font-semibold text-gray-800 mb-4">About</h2>

                            <div class="ck-content prose prose-sm max-w-none text-gray-700">
                                {!! $event->body !!}
                            </div>
                        </div>
                </div>

                <!-- Action Section -->
                <div class="border-t border-gray-200 pt-8">
                    <div class="flex flex-col sm:flex-row gap-4 justify-center sm:justify-start">
                        <a href="{{ route('events.list') }}" class="btn-gray inline-flex items-center justify-center">
                            <i data-lucide="arrow-left" class="w-4 h-4 mr-2"></i>
                            Back to Events
                        </a>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>

</x-guest-layout>
