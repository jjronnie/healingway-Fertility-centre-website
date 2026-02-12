<!-- Upcoming Events Section -->
<section id="upcoming-events" class="py-16 md:py-24 bg-blue-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <!-- Section Header -->
        <div class="mb-12 md:mb-16">
            <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold text-hw-blue mb-4">
                Upcoming Events
            </h2>
            <p class="text-lg md:text-xl text-gray-600 max-w-3xl">
                Join us for informative events, workshops, and support sessions designed to guide you through your
                health journey.
            </p>
        </div>

        <!-- Events Grid -->
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">

            @foreach ($upcomingEvents as $event)
                <!-- Event Card 1 -->
                <div
                    class="bg-white rounded-2xl overflow-hidden  hover:shadow-2xl transition-all duration-300 group">

                    <!-- Featured Image -->
                    <div class="aspect-[16/10] overflow-hidden bg-gray-200">
                        @php
                            $eventImage = $event->getFirstMediaUrl('photo', 'webp')
                                ?: ($event->featured_image ? asset('storage/' . $event->featured_image) : asset('assets/img/event.webp'));
                        @endphp
                        <img src="{{ $eventImage }}" alt="{{ $event->title }}"
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                    </div>

                    <!-- Content -->
                    <div class="p-6">
                        <!-- Date & Time -->
                        <div class="flex items-center text-sm text-hw-blue  mb-3 space-x-2">

                            <!-- Date -->
                            <div class="flex items-center">
                                <i data-lucide="calendar" class="w-4 h-4 mr-1"></i>
                                <span>{{ $event->formatted_date ?? '' }}</span>
                            </div>

                            <!-- Time -->
                            <div class="flex items-center">
                                <i data-lucide="clock" class="w-4 h-4 mr-1"></i>
                                <span>{{ $event->event_time ? \Carbon\Carbon::parse($event->event_time)->format('h:i A') : '-' }}</span>
                            </div>

                          

                        </div>

                        <!-- Venue -->
                        <div class="flex items-center text-hw-blue mb-2">
                            <i data-lucide="map-pin" class="w-4 h-4 mr-1"></i>
                            <span>{{ $event->venue ?? '-' }}</span>
                        </div>

                        <!-- Event Title -->
                        <h3 class="text-lg font-bold text-gray-900 mb-3 group-hover:text-blue-900 transition-colors">
                            {{ $event->title }}
                        </h3>

                       

                        <!-- Button -->
                        <a href="{{ route('events.show', $event) }}"
                            class="inline-flex items-center px-6 py-3 bg-blue-900 text-white rounded-full hover:bg-blue-800 transition-colors font-semibold group/btn">
                              View Event Details
                            <svg class="w-4 h-4 ml-2 group-hover/btn:translate-x-1 transition-transform" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 8l4 4m0 0l-4 4m4-4H3" />
                            </svg>
                        </a>
                    </div>
                </div>
            @endforeach





        </div>

        <!-- View All Events Button -->
        <div class="text-center mt-12">
            <a href="#"
                class="inline-flex items-center px-8 py-4 bg-white border-2 border-blue-900 text-blue-900 rounded-full hover:bg-blue-50 transition-all font-semibold text-lg group">
                View All Events
                <svg class="w-5 h-5 ml-2 group-hover:translate-x-1 transition-transform" fill="none"
                    stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17 8l4 4m0 0l-4 4m4-4H3" />
                </svg>
            </a>
        </div>

    </div>
</section>
