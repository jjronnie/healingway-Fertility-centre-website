<x-slide-form button-icon="eye" title="Event Details">

    <div class="space-y-4">

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">


        <!-- Title -->
        <div class="py-2 border-b">
            <h3 class="font-semibold text-gray-700">Title</h3>
            <p class="text-gray-900">{{ $event->title }}</p>
        </div>

            <!-- Featured Image -->
        @if($event->featured_image)
        <div class="py-2 border-b">
            <h3 class="font-semibold text-gray-700">Featured Image</h3>
            <img src="{{ asset('storage/'.$event->featured_image) }}" alt="Featured Image" class="w-full max-w-sm rounded">
        </div>
        @endif

        
        </div>

        <!-- Summary -->
        <div class="py-2 border-b">
            <h3 class="font-semibold text-gray-700">Summary</h3>
            <p class="text-gray-900">{{ $event->summary }}</p>
        </div>

        

        <!-- Venue -->
        <div class="py-2 border-b">
            <h3 class="font-semibold text-gray-700">Venue</h3>
            <p class="text-gray-900">{{ $event->venue ?? '-' }}</p>
        </div>

        <!-- Event Date & Time -->
        <div class="py-2 border-b">
            <h3 class="font-semibold text-gray-700">Event Date & Time</h3>
            <p class="text-gray-900">
                {{ $event->event_date ?? '-' }}
                @if($event->event_time)
                    at {{ $event->event_time }}
                @endif
            </p>
        </div>

        <!-- Status -->
        <div class="py-2 border-b">
            <h3 class="font-semibold text-gray-700">Status</h3>
            <p class="text-gray-900 capitalize">{{ $event->status }}</p>
        </div>

        <!-- Full Details (Body) -->
        <div class="py-2 border-b">
            <h3 class="font-semibold text-gray-700">Full Details</h3>
            <div class="text-gray-900 prose max-w-full">
                {!! $event->body !!}
            </div>
        </div>

    

        <!-- Created By -->
        <div class="py-2 border-b">
            <h3 class="font-semibold text-gray-700">Created By</h3>
            <p class="text-gray-900">{{ $event->creator->name ?? '-' }}</p>
        </div>

        <!-- Created At -->
        <div class="py-2">
            <h3 class="font-semibold text-gray-700">Created At</h3>
            <p class="text-gray-900">{{ $event->created_at->format('M d, Y h:i A') }}</p>
        </div>

    </div>

</x-slide-form>
