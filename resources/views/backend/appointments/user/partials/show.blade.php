 <x-popup-modal title="Appointment Details">

     <x-slot name="trigger">

         <i class="fa-solid fa-info w-5 h-5 border rounded-full  text-gray-500 hover:text-gray-700 hover:cursor-pointer"></i>

     </x-slot>





      <div class="space-y-4">

        



        <div class="flex justify-between items-center border-b border-gray-300 pb-2">
            <span class=" text-gray-600">Appointment Date:</span>
            <span class="text-black font-medium">{{ $appointment->appointment_date->format('d M, Y \a\t h:i A') }}</span>
        </div>

        <div class="flex justify-between items-center border-b border-gray-300 pb-2">
            <span class=" text-gray-600">Status:</span>
            <span class="text-black font-medium capitalize">
                <x-status-badge :status="$appointment->status" />
            </span>
        </div>

        <div class="border-b border-gray-300 pb-3">
            <span class="block  text-gray-600 mb-1">
                Service:
            </span>
            <p class="text-black font-medium break-words whitespace-normal">
                {{ $appointment->service_name }}
            </p>
        </div>


        <div class="border-b border-gray-300 pb-3">
            <span class="block  text-gray-600 mb-1">
                Person to See:
            </span>
            <p class="text-black font-medium break-words whitespace-normal">
                {{ $appointment->person_to_see }}
            </p>
        </div>

        @if ($appointment->notes)
            <div class="border-b border-gray-300 pb-3">
                <span class="block  text-gray-600 mb-1">
                    Notes:
                </span>
                <p class="text-black font-medium break-words whitespace-normal">
                    {{ $appointment->notes }}
                </p>
            </div>
        @endif






        {{-- Confirmed At --}}
        @if ($appointment->confirmed_at)
            <div class="flex justify-between items-center border-b border-gray-300 pb-2">
                <span class=" text-gray-600">Confirmed At:</span>
                <span class="text-black font-medium">
                    {{ $appointment->confirmed_at->format('d M, Y \a\t h:i A') }}
                </span>
            </div>
        @endif

        {{-- Confirmed By --}}
        @if ($appointment->confirmedBy)
            <div class="flex justify-between items-center border-b border-gray-300 pb-2">
                <span class=" text-gray-600">Confirmed By:</span>
                <span class="text-black font-medium">
                    {{ $appointment->confirmedBy->name }}
                </span>
            </div>
        @endif


        {{-- Completed At --}}
        @if ($appointment->completed_at)
            <div class="flex justify-between items-center border-b border-gray-300 pb-2">
                <span class=" text-gray-600">Completed At:</span>
                <span class="text-black font-medium">
                    {{ $appointment->completed_at->format('d M, Y \a\t h:i A') }}
                </span>
            </div>
        @endif

        {{-- Completed By --}}
        @if ($appointment->completedBy)
            <div class="flex justify-between items-center border-b border-gray-300 pb-2">
                <span class=" text-gray-600">Completed By:</span>
                <span class="text-black font-medium">
                    {{ $appointment->completedBy->name }}
                </span>
            </div>
        @endif





        {{-- Cancelled At --}}
        @if ($appointment->cancelled_at)
            <div class="flex justify-between items-center border-b border-gray-300 pb-2">
                <span class=" text-gray-600">Cancelled At:</span>
                <span class="text-black font-medium">
                    {{ $appointment->cancelled_at->format('d M, Y \a\t h:i A') }}
                </span>
            </div>
        @endif

        {{-- Cancelled By --}}
        @if ($appointment->cancelledBy)
            <div class="flex justify-between items-center border-b border-gray-300 pb-2">
                <span class=" text-gray-600">Cancelled By:</span>
                <span class="text-black font-medium">
                    {{ $appointment->cancelledBy->name }}
                </span>
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

    </div>

 </x-popup-modal>
