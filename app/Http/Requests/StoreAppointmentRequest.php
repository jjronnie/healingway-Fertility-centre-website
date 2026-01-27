<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAppointmentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'service_id' => ['nullable', 'exists:services,id', 'required_without:custom_service'],
            'custom_service' => ['nullable', 'string', 'max:255', 'required_without:service_id'],
            'appointment_date' => ['required', 'date', 'after_or_equal:today'], // <-- prevents past dates
            'staff_id' => ['nullable', 'exists:staff,id'],
            'custom_person_to_see' => ['nullable', 'string', 'max:255'],
            'notes' => ['nullable', 'string'],
        ];
    }


      public function messages(): array
    {
        return [
            'appointment_date.after_or_equal' => 'Appointment date must be today or in the future.',
        ];
    }
}
