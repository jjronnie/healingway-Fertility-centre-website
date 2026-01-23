<x-app-layout>

    <x-page-title title="Activity"/>


    <div x-data="{ tab: 'upcoming' }" class="mb-6 border-b border-gray-200">
    <nav class="-mb-px flex space-x-6" aria-label="Tabs">
        <button
            @click="tab = 'upcoming'"
            :class="tab === 'upcoming' ? 'border-orange-500 text-orange-500' : 'border-transparent text-gray-500'"
            class="whitespace-nowrap pb-4 px-1 border-b-2 font-medium  "
        >
            Upcoming
        </button>

        <button
            @click="tab = 'completed'"
            :class="tab === 'completed' ? 'border-orange-500 text-orange-500' : 'border-transparent text-gray-500'"
            class="whitespace-nowrap pb-4 px-1 border-b-2 font-medium "
        >
            Completed
        </button>

        <button
            @click="tab = 'cancelled'"
            :class="tab === 'cancelled' ? 'border-orange-500 text-orange-500' : 'border-transparent text-gray-500'"
            class="whitespace-nowrap pb-4 px-1 border-b-2 font-medium  "
        >
            Cancelled
        </button>
    </nav>

    {{-- Appointment cards container --}}
     <div class="grid gap-4 sm:grid-cols-1 md:grid-cols-2 ">
    <div class="mt-4">
        <template x-if="tab === 'upcoming'">
            <div>
                @foreach($upcoming as $appointment)
                    <x-appointment-card :appointment="$appointment" />
                @endforeach
            </div>
        </template>

        <template x-if="tab === 'completed'">

            @if (!empty($completed))
                <x-empty-state icon="list-checks" message="Your completed bookings will appear here" />
                
            @else
                
            <div>
                @foreach($completed as $appointment)
                    <x-appointment-card :appointment="$appointment" />
                @endforeach
            </div>
            @endif

        </template>

        <template x-if="tab === 'cancelled'">
            <div>
                @foreach($cancelled as $appointment)
                    <x-appointment-card :appointment="$appointment" />
                @endforeach
            </div>
        </template>
    </div>
    </div>
</div>





  
</x-app-layout>
