@php
    $selectedService = old('service_id', optional($appointment)->service_id);
    $selectedStaff = old('staff_id', optional($appointment)->staff_id);
@endphp

<div
    x-data="{
        serviceChoice: @js($selectedService),
        customService: @js(old('custom_service', optional($appointment)->custom_service)),
        staffChoice: @js($selectedStaff),
        customStaff: @js(old('custom_person_to_see', optional($appointment)->custom_person_to_see)),
    }"
    x-init="
        if (!serviceChoice && customService) serviceChoice = 'other';
        if (!staffChoice && customStaff) staffChoice = 'other';
    "
    class="space-y-6"
>
<div class="grid grid-cols-1 md:grid-cols-2 gap-4">
    <div>
        <label for="service_id" class="block text-sm label font-medium text-gray-700">
            Service
            <x-required-mark />
        </label>
        <select name="service_choice" id="service_id" x-model="serviceChoice" required
            class="w-full input px-4 py-2 border @error('service_id') border-red-500 @enderror rounded-lg focus:ring-2 focus:ring-hw-green focus:border-hw-green">
            <option value="">Select a service</option>
            @foreach($services as $service)
                <option value="{{ $service->id }}" {{ (string) $selectedService === (string) $service->id ? 'selected' : '' }}>
                    {{ $service->name }}
                </option>
            @endforeach
            <option value="other">Other</option>
        </select>
        <input type="hidden" name="service_id" x-bind:value="serviceChoice && serviceChoice !== 'other' ? serviceChoice : ''">
        @error('service_id')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div x-cloak x-show="serviceChoice === 'other'" x-transition>
        <label for="custom_service" class="block text-sm label font-medium text-gray-700">
            Enter Other Service
            <x-required-mark />
        </label>
        <input type="text" name="custom_service" id="custom_service" x-model="customService"
            :required="serviceChoice === 'other'"
            placeholder="Type a custom service"
            class="w-full input px-4 py-2 border @error('custom_service') border-red-500 @enderror rounded-lg focus:ring-2 focus:ring-hw-green focus:border-hw-green">
        @error('custom_service')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 gap-4">
    <div>
        <label for="staff_id" class="block text-sm label font-medium text-gray-700">
            Staff Member (optional)
        </label>
        <select name="staff_choice" id="staff_id" x-model="staffChoice"
            class="w-full input px-4 py-2 border @error('staff_id') border-red-500 @enderror rounded-lg focus:ring-2 focus:ring-hw-green focus:border-hw-green">
            <option value="">No preference</option>
            @foreach($staff as $member)
                <option value="{{ $member->id }}" {{ (string) $selectedStaff === (string) $member->id ? 'selected' : '' }}>
                    {{ $member->name }}
                </option>
            @endforeach
            <option value="other">Other</option>
        </select>
        <input type="hidden" name="staff_id" x-bind:value="staffChoice !== 'other' ? staffChoice : ''">
        @error('staff_id')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div x-cloak x-show="staffChoice === 'other'" x-transition>
        <label for="custom_person_to_see" class="block text-sm label font-medium text-gray-700">
            Enter Other Staff
            <x-required-mark />
        </label>
        <input type="text" name="custom_person_to_see" id="custom_person_to_see"
            x-model="customStaff" :required="staffChoice === 'other'"
            placeholder="Type a staff member name"
            class="w-full input px-4 py-2 border @error('custom_person_to_see') border-red-500 @enderror rounded-lg focus:ring-2 focus:ring-hw-green focus:border-hw-green">
        @error('custom_person_to_see')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>
</div>

<div>
    <label for="appointment_date" class="block text-sm label font-medium text-gray-700">
        Appointment Date
        <x-required-mark />
    </label>
    <input type="datetime-local" name="appointment_date" id="appointment_date"
        value="{{ old('appointment_date', optional(optional($appointment)->appointment_date)->format('Y-m-d\\TH:i')) }}"
        min="{{ now()->format('Y-m-d\\TH:i') }}"
        required
        class="w-full input px-4 py-2 border @error('appointment_date') border-red-500 @enderror rounded-lg focus:ring-2 focus:ring-hw-green focus:border-hw-green">
    @error('appointment_date')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
    @enderror
</div>

<div>
    <label for="notes" class="block text-sm label font-medium text-gray-700">
        Notes (optional)
    </label>
    <textarea name="notes" id="notes" rows="4"
        class="w-full input px-4 py-2 border @error('notes') border-red-500 @enderror rounded-lg focus:ring-2 focus:ring-hw-green focus:border-hw-green">{{ old('notes', optional($appointment)->notes) }}</textarea>
    @error('notes')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
    @enderror
</div>
</div>
