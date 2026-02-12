<x-guest-layout>

    <x-page-header title="Events" description="Stay informed about our educational seminars, workshops, and fertility awareness events designed to support your journey." />

    <!-- Upcoming Events Section -->
    <section class="-mt-32 pb-12 md:pb-20 px-3 relative z-10">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 p-8 bg-white rounded-3xl shadow-lg">
            
            <!-- Upcoming Events Title -->
            <div class="mb-10">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-2">Upcoming Events</h2>
                <div class="h-1 w-20 bg-hw-blue rounded"></div>
            </div>

            <!-- Upcoming Events Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 mb-12">
                @forelse ($upcomingEvents as $event)
                    <a href="{{ route('events.show', $event->slug) }}">
                        <div class="bg-white border border-hw-green hover:bg-gradient-to-t from-white to-blue-100 hover:border-hw-blue hover:-translate-y-2 hover:shadow-xl transition-all rounded-3xl shadow-lg overflow-hidden h-full flex flex-col">
                            
                            <!-- Event Image -->
                            <div class="h-56 overflow-hidden">
                                @php
                                    $eventImage = $event->getFirstMediaUrl('photo', 'webp')
                                        ?: ($event->featured_image ? asset('storage/' . $event->featured_image) : asset('assets/img/1.webp'));
                                @endphp
                                <img src="{{ $eventImage }}" alt="{{ $event->title }}"
                                    class="w-full h-full object-cover" loading="lazy">
                            </div>

                            <!-- Event Content -->
                            <div class="p-6 flex flex-col flex-grow">
                                
                                <!-- Event Title -->
                                <h3 class="text-xl font-bold text-gray-900 mb-3 line-clamp-2">
                                    {{ $event->title }}
                                </h3>

                                <!-- Event Summary -->
                                <p class="text-gray-600 text-sm line-clamp-2 mb-4 flex-grow">
                                    {{ $event->summary }}
                                </p>

                                <!-- Event Meta -->
                                <div class="space-y-2 text-sm text-gray-600">
                                    <div class="flex items-center gap-2">
                                        <i data-lucide="calendar" class="w-4 h-4 text-hw-blue flex-shrink-0"></i>
                                        <span>{{ $event->formatted_date }}</span>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <i data-lucide="clock" class="w-4 h-4 text-hw-blue flex-shrink-0"></i>
                                        <span>{{ $event->formatted_time }}</span>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <i data-lucide="map-pin" class="w-4 h-4 text-hw-blue flex-shrink-0"></i>
                                        <span class="line-clamp-1">{{ $event->venue ?? 'TBA' }}</span>
                                    </div>
                                </div>

                                <!-- Learn More Link -->
                                <div class="text-hw-blue font-semibold text-sm mt-4">
                                    Learn More →
                                </div>
                            </div>
                        </div>
                    </a>
                @empty
                    <div class="col-span-full py-12">
                        <x-empty-state icon="calendar-x" message="No upcoming events scheduled at the moment. Check back soon!" />
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- Past Events Section -->
    @if ($pastEvents->isNotEmpty())
        <section class="pb-12 md:pb-20 bg-gray-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 p-8 bg-white rounded-3xl shadow-lg">
                
                <!-- Past Events Title -->
                <div class="mb-10">
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-2">Past Events</h2>
                    <div class="h-1 w-20 bg-gray-400 rounded"></div>
                </div>

                <!-- Past Events Grid -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach ($pastEvents as $event)
                        <a href="{{ route('events.show', $event->slug) }}">
                            <div class="bg-white border border-gray-300 hover:bg-gradient-to-t from-white to-gray-100 hover:border-gray-400 hover:-translate-y-2 hover:shadow-xl transition-all rounded-3xl shadow-lg overflow-hidden h-full flex flex-col opacity-75 hover:opacity-100">
                                
                                <!-- Event Image -->
                                <div class="h-56 overflow-hidden">
                                    @php
                                        $eventImage = $event->getFirstMediaUrl('photo', 'webp')
                                            ?: ($event->featured_image ? asset('storage/' . $event->featured_image) : asset('assets/img/1.webp'));
                                    @endphp
                                    <img src="{{ $eventImage }}" alt="{{ $event->title }}"
                                        class="w-full h-full object-cover grayscale hover:grayscale-0 transition-all" loading="lazy">
                                </div>

                                <!-- Event Content -->
                                <div class="p-6 flex flex-col flex-grow">
                                    
                                    <!-- Event Title -->
                                    <h3 class="text-xl font-bold text-gray-900 mb-1 line-clamp-2">
                                        {{ $event->title }}
                                    </h3>

                                    <!-- Past Event Badge -->
                                    <span class="inline-block w-fit text-xs font-semibold text-gray-500 mb-3">
                                        Event Ended
                                    </span>

                                    <!-- Event Meta -->
                                    <div class="space-y-2 mb-4 text-sm text-gray-600 flex-grow">
                                        <div class="flex items-center gap-2">
                                            <i data-lucide="calendar" class="w-4 h-4 text-gray-400"></i>
                                            <span>{{ $event->formatted_date }}</span>
                                        </div>
                                        <div class="flex items-center gap-2">
                                            <i data-lucide="map-pin" class="w-4 h-4 text-gray-400"></i>
                                            <span class="line-clamp-1">{{ $event->venue ?? 'TBA' }}</span>
                                        </div>
                                    </div>

                                    <!-- Event Summary -->
                                    <p class="text-gray-600 text-sm line-clamp-2">
                                        {{ $event->summary }}
                                    </p>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

</x-guest-layout>
