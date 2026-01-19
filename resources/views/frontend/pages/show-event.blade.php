<x-guest-layout>

    <x-page-header title="{{ $event->title }}" description="{{ $event->summary ?? '' }}" />

    <!-- Single Event Detail Section -->
    <section class="-mt-32 pb-20 relative z-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8  p-8 ">


     
            <div class="grid  gap-12">

                <!-- Main Content -->
                <div class="lg:col-span-2">

                    <!-- Featured Image -->
                    <div class="aspect-[16/9] rounded-3xl overflow-hidden mb-8 shadow-xl">
                        <img src="{{ asset('storage/' . $event->featured_image) }}" alt="{{ $event->title }}"
                            class="w-full h-full object-cover">
                    </div>

                    <!-- Event Title -->
                    <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-gray-900 mb-6">
                        Understanding IVF: A Comprehensive Guide
                    </h1>

                    <!-- Event Meta -->
                    <div class="flex flex-wrap gap-6 mb-8 pb-8 border-b border-gray-200">
                        <div class="flex items-center text-gray-700">
                            <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center mr-3">
                                <svg class="w-5 h-5 text-blue-900" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <div>
                                <div class="text-sm text-gray-500">Date</div>
                                <div class="font-semibold">February 15, 2026</div>
                            </div>
                        </div>

                        <div class="flex items-center text-gray-700">
                            <div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center mr-3">
                                <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <div>
                                <div class="text-sm text-gray-500">Time</div>
                                <div class="font-semibold">2:00 PM - 4:00 PM</div>
                            </div>
                        </div>

                        <div class="flex items-center text-gray-700">
                            <div class="w-10 h-10 bg-purple-100 rounded-full flex items-center justify-center mr-3">
                                <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </div>
                            <div>
                                <div class="text-sm text-gray-500">Location</div>
                                <div class="font-semibold">HealingWay Centre, Main Hall</div>
                            </div>
                        </div>

                        
                    </div>

                    <!-- Event Description -->
                    <div class="prose prose-lg max-w-none mb-8">
                        <h2 class="text-3xl font-bold text-gray-900 mb-4">About This Event</h2>
                        <p class="text-gray-700 leading-relaxed mb-4">
                            Join our expert fertility specialists for an in-depth educational seminar covering
                            everything you need to know about In Vitro Fertilization (IVF). Whether you're just
                            beginning to explore fertility treatment options or you're already considering IVF, this
                            comprehensive session will provide you with valuable insights and information.
                        </p>
                        <p class="text-gray-700 leading-relaxed mb-4">
                            During this two-hour seminar, our medical team will walk you through the entire IVF process,
                            from initial consultations and ovarian stimulation to embryo transfer and pregnancy testing.
                            We'll discuss success rates, potential risks and complications, and what you can do to
                            optimize your chances of a successful outcome.
                        </p>
                        <p class="text-gray-700 leading-relaxed mb-6">
                            This is also a wonderful opportunity to meet our team, tour our state-of-the-art laboratory
                            facilities, and ask any questions you may have in a supportive, non-judgmental environment.
                        </p>

                        <h3 class="text-2xl font-bold text-gray-900 mb-3">What You'll Learn</h3>
                        <ul class="space-y-3 mb-6">
                            <li class="flex items-start">
                                <svg class="w-6 h-6 text-green-500 mr-3 flex-shrink-0 mt-0.5" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7" />
                                </svg>
                                <span class="text-gray-700">Step-by-step overview of the IVF process and timeline</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="w-6 h-6 text-green-500 mr-3 flex-shrink-0 mt-0.5" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7" />
                                </svg>
                                <span class="text-gray-700">Understanding success rates and factors that influence
                                    outcomes</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="w-6 h-6 text-green-500 mr-3 flex-shrink-0 mt-0.5" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7" />
                                </svg>
                                <span class="text-gray-700">Medication protocols and what to expect during
                                    treatment</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="w-6 h-6 text-green-500 mr-3 flex-shrink-0 mt-0.5" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7" />
                                </svg>
                                <span class="text-gray-700">Financial considerations and available support
                                    options</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="w-6 h-6 text-green-500 mr-3 flex-shrink-0 mt-0.5" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7" />
                                </svg>
                                <span class="text-gray-700">Lifestyle factors that can improve IVF success</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="w-6 h-6 text-green-500 mr-3 flex-shrink-0 mt-0.5" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7" />
                                </svg>
                                <span class="text-gray-700">Emotional support resources and coping strategies</span>
                            </li>
                        </ul>

                        <h3 class="text-2xl font-bold text-gray-900 mb-3">Who Should Attend</h3>
                        <p class="text-gray-700 leading-relaxed mb-6">
                            This seminar is designed for anyone interested in learning more about IVF, including couples
                            exploring fertility treatment options, individuals considering single parenthood, same-sex
                            couples, and those who have experienced difficulty conceiving naturally.
                        </p>

                        <h3 class="text-2xl font-bold text-gray-900 mb-3">What's Included</h3>
                        <ul class="space-y-3 mb-6">
                            <li class="flex items-start">
                                <svg class="w-6 h-6 text-blue-500 mr-3 flex-shrink-0 mt-0.5" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span class="text-gray-700">Comprehensive IVF information packet</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="w-6 h-6 text-blue-500 mr-3 flex-shrink-0 mt-0.5" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span class="text-gray-700">Light refreshments and beverages</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="w-6 h-6 text-blue-500 mr-3 flex-shrink-0 mt-0.5" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span class="text-gray-700">Q&A session with our fertility specialists</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="w-6 h-6 text-blue-500 mr-3 flex-shrink-0 mt-0.5" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span class="text-gray-700">Guided tour of our laboratory facilities</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="w-6 h-6 text-blue-500 mr-3 flex-shrink-0 mt-0.5" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span class="text-gray-700">Complimentary initial consultation voucher</span>
                            </li>
                        </ul>
                    </div>

                 

                </div>

               

            </div>

        </div>
    </section>

    <section class="py-16 bg-gray-50">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 bg-white shadow rounded-lg overflow-hidden">

            <!-- Featured Image -->
            @if ($event->featured_image)
                <img src="{{ asset('storage/' . $event->featured_image) }}" alt="{{ $event->title }}"
                    class="w-full h-96 object-cover">
            @endif

            <div class="p-8 space-y-6">

                <!-- Title -->
                <h1 class="text-4xl font-bold text-gray-800">{{ $event->title }}</h1>

                <!-- Date, Time, Venue -->
                <div class="flex flex-wrap items-center text-gray-600 space-x-6 mt-2 text-sm font-medium">

                    <div class="flex items-center space-x-1">
                        <i data-lucide="calendar" class="w-4 h-4"></i>
                        <span>{{ $event->event_date?->format('F d, Y') ?? '-' }}</span>
                    </div>

                    <div class="flex items-center space-x-1">
                        <i data-lucide="clock" class="w-4 h-4"></i>
                        <span>{{ $event->event_time ? \Carbon\Carbon::parse($event->event_time)->format('h:i A') : '-' }}</span>
                    </div>

                    <div class="flex items-center space-x-1">
                        <i data-lucide="map-pin" class="w-4 h-4"></i>
                        <span>{{ $event->venue ?? '-' }}</span>
                    </div>
                </div>

                <!-- Status & Created By -->
                <div class="flex flex-wrap items-center space-x-6 text-sm text-gray-500">
                    <span>Status: <span class="capitalize">{{ $event->status }}</span></span>
                    <span>Created by: {{ $event->creator->name ?? '-' }}</span>
                    <span>Created at: {{ $event->created_at->format('F d, Y h:i A') }}</span>
                </div>

                <!-- Summary -->
                <p class="text-gray-700 text-lg font-medium">{{ $event->summary }}</p>

                <!-- Full Details -->
                <div class="prose max-w-full text-gray-800 mt-4">
                    {!! $event->body !!}
                </div>

            </div>
        </div>
    </section>





</x-guest-layout>
