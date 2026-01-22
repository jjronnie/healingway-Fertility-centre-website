<x-popup-modal title="Appointment Details" buttonIcon="eye">




    <div class="space-y-4">

        {{-- Each detail row --}}
        <div class="flex justify-between items-center border-b border-gray-300 pb-2">
            <span class=" text-gray-600">Patient:</span>
            <span class="text-black font-medium">{{ $appointment->user->name }}</span>
        </div>




        <div class="flex justify-between items-center border-b border-gray-300 pb-2">
            <span class=" text-gray-600">Date & Time:</span>
            <span class="text-black font-medium">{{ $appointment->appointment_date->format('d M, Y H:i') }}</span>
        </div>

        <div class="flex justify-between items-center border-b border-gray-300 pb-2">
            <span class=" text-gray-600">Status:</span>
            <span class="text-black font-medium capitalize">
                <x-status-badge :status="$appointment->status" />
            </span>
        </div>

        <div class="border-b border-gray-300 pb-3">
            <span class="block  text-gray-600 mb-1">
                Service(s):
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
                    {{ $appointment->confirmed_at->format('d M, Y H:i') }}
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
                    {{ $appointment->completed_at->format('d M, Y H:i') }}
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
                    {{ $appointment->cancelled_at->format('d M, Y H:i') }}
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


    <div class="flex flex-wrap gap-2 m-4 justify-center">

        {{-- Pending → can Confirm or Cancel --}}
        @if ($appointment->status === 'pending')
            <x-confirm-modal :action="route('admin.appointments.updateStatus', $appointment)" warning="Are you sure you want to confirm this appointment?"
                triggerText="Confirm appointment" method="PUT" triggerClass="btn-success">
                <input type="hidden" name="status" value="confirmed">
            </x-confirm-modal>

            @include('backend.appointments.admin.cancel')
        @endif

        {{-- Confirmed → can Complete or Cancel --}}
        @if ($appointment->status === 'confirmed')
            <x-confirm-modal :action="route('admin.appointments.updateStatus', $appointment)" warning="Mark this appointment as completed?"
                triggerText="Mark as completed" triggerClass="btn-success" method="PUT">
                <input type="hidden" name="status" value="completed">
            </x-confirm-modal>

            @include('backend.appointments.admin.cancel')
        @endif

        {{-- Cancelled or Completed → show disabled info --}}
        @if (in_array($appointment->status, ['cancelled', 'completed']))
            <button disabled class="px-4 py-2 bg-gray-300 cursor-not-allowed text-gray-600 rounded">
                Appointment {{ ucfirst($appointment->status) }}
            </button>
        @endif

    </div>


</x-popup-modal>
