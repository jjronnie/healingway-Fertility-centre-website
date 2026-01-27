<x-app-layout>

    <div class="flex flex-col gap-4 mb-4 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <x-page-title title="Activity"/>
            <p class="text-sm text-gray-500 mb-2">Track all your bookings, updates, and outcomes in one place.</p>
        </div>
        <a href="{{ route('user.appointments.create') }}" class="btn w-sm">
            Book Appointment
        </a>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-6">
        <x-stat-card title="Upcoming" value="{{ $upcoming->count() }}" icon="calendar-clock" />
        <x-stat-card title="Completed" value="{{ $completed->count() }}" icon="check-circle" />
        <x-stat-card title="Cancelled" value="{{ $cancelled->count() }}" icon="x-circle" />
    </div>


    <div x-data="{ tab: 'upcoming' }" class="mb-12  p-4 ">
    <nav class="-mb-px flex space-x-6" aria-label="Tabs">
        <button
            @click="tab = 'upcoming'"
            :class="tab === 'upcoming' ? 'border-orange-500 text-orange-500' : 'border-transparent text-gray-500'"
            class="whitespace-nowrap pb-4 px-1 border-b-2 font-medium  "
        >
            Upcoming ({{ $upcoming->count() }})
        </button>

        <button
            @click="tab = 'completed'"
            :class="tab === 'completed' ? 'border-orange-500 text-orange-500' : 'border-transparent text-gray-500'"
            class="whitespace-nowrap pb-4 px-1 border-b-2 font-medium "
        >
            Completed ({{ $completed->count() }})
        </button>

        <button
            @click="tab = 'cancelled'"
            :class="tab === 'cancelled' ? 'border-orange-500 text-orange-500' : 'border-transparent text-gray-500'"
            class="whitespace-nowrap pb-4 px-1 border-b-2 font-medium  "
        >
            Cancelled ({{ $cancelled->count() }})
        </button>
    </nav>

    {{-- Appointment cards container --}}
    <div class="grid gap-4 sm:grid-cols-1 md:grid-cols-2">
        <div class="mt-4">
            <template x-if="tab === 'upcoming'">
                <div>
                    @if ($upcoming->isEmpty())
                        <x-empty-state icon="calendar-x" message="Your upcoming bookings will appear here" />
                    @else
                        <div class="grid gap-4">
                            @foreach($upcoming as $appointment)
                                <x-appointment-card :appointment="$appointment" />
                            @endforeach
                        </div>
                    @endif
                </div>
            </template>

            <template x-if="tab === 'completed'">
                <div>
                    @if ($completed->isEmpty())
                        <x-empty-state icon="list-checks" message="Your completed bookings will appear here" />
                    @else
                        <div class="grid gap-4">
                            @foreach($completed as $appointment)
                                <x-appointment-card :appointment="$appointment" />
                            @endforeach
                        </div>
                    @endif
                </div>
            </template>

            <template x-if="tab === 'cancelled'">
                <div>
                    @if ($cancelled->isEmpty())
                        <x-empty-state icon="calendar-x" message="Your cancelled bookings will appear here" />
                    @else
                        <div class="grid gap-4">
                            @foreach($cancelled as $appointment)
                                <x-appointment-card :appointment="$appointment" />
                            @endforeach
                        </div>
                    @endif
                </div>
            </template>
        </div>
    </div>
</div>





  
</x-app-layout>
