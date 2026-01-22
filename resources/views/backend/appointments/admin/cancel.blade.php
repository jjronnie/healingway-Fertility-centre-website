<x-popup-modal title="Cancel Appointment">

    <x-slot name="trigger">
        <button type="button" class="btn-gray">
            Cancel appointment
        </button>
    </x-slot>

    <form action="{{ route('admin.appointments.updateStatus', $appointment) }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')

        {{-- Status --}}
        <input type="hidden" name="status" value="cancelled">

        {{-- Header Information --}}
        <div class="space-y-4">
            <div class="bg-blue-50 border-l-4 border-blue-500 p-4 rounded   break-words whitespace-normal">
                <h3 class="font-semibold text-blue-900 mb-1">Cancellation Requirements</h3>
                <p class="text-blue-800 text-sm">You must provide a reason for cancellation or notes to inform the
                    patient how to proceed.</p>
            </div>

            <div class="bg-red-50 border-l-4 border-red-500 p-4 rounded     break-words whitespace-normal">
                <div class="flex items-start gap-3">
                    <i data-lucide="alert-circle" class="w-5 h-5 text-red-600 flex-shrink-0 mt-0.5"></i>
                    <div>
                        <h3 class="font-semibold text-red-900 mb-1">Warning</h3>
                        <p class="text-red-800 text-sm">This action is irreversible. Please ensure you have reviewed all
                            appointment details before proceeding.</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- Cancel reason --}}
        <div>
            <label class="label">
                Cancellation Reason <x-required-mark />
            </label>

            <textarea name="cancel_reason" required rows="5"
                class="w-full border input rounded-lg px-3 py-2 focus:ring focus:ring-red-200 focus:outline-none"
                placeholder="Explain why this appointment is being cancelled..."></textarea>
        </div>

        {{-- Actions --}}
        <div class="flex justify-end gap-3 pt-4 border-t">
            <x-loading-button text="Submit" class="btn" />
        </div>


    </form>


</x-popup-modal>
