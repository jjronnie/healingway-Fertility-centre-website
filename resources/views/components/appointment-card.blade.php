@props(['appointment'])

<div class="bg-white rounded-lg shadow p-4 mb-4">
    <div class="flex justify-between items-start mb-2">
        <h3 class="font-semibold text-gray-900">{{ $appointment->service_name }}</h3>

        <x-status-badge :status="$appointment->status" />

    </div>



    {{-- Appointment date/time --}}
    <div class="flex items-center text-gray-500 text-sm mb-2">


        <i class="fa-regular fa-calendar w-5 h-5 mr-2 "></i>

        {{ $appointment->appointment_date->format('d M, Y \a\t h:i A') }}
    </div>

    {{-- person_to_see if available --}}
    @if ($appointment->person_to_see)
        <div class="flex items-center text-gray-500 text-sm mb-2">


            <i class="fa-solid fa-user w-5 h-5 mr-2 "></i>

            {{ $appointment->person_to_see }}
        </div>
    @endif

    @if ($appointment->cancel_reason)
        <div class="border-b border-gray-300 pb-3">
            <span class="block font-medium text-gray-600 mb-1">
                Cancel Reason:
            </span>
            <p class="text-black font-medium break-words whitespace-normal">
                {{ $appointment->cancel_reason }}
            </p>
        </div>
    @endif

    <hr class="my-2 border-gray-300">

    {{-- Price --}}
    {{-- <div class="text-orange-500 font-semibold mb-2">
        {{ number_format($appointment->price ?? 0) }} UGX
    </div> --}}

    {{-- Actions: Call / Message --}}
    <div class="flex space-x-4 justify-start mt-2">
        @if ($appointment->status === 'pending')
            @include('backend.appointments.user.partials.edit')
        @endif


        @include('backend.appointments.user.partials.show')


    </div>
</div>
