<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PatientDetailController extends Controller
{
    public function edit(Request $request)
    {
        $user = $request->user();
        $detail = $user->patientDetail;

        return view('backend.patients.edit', compact('user', 'detail'));
    }

    public function update(Request $request)
    {
        $user = $request->user();

        $validated = $request->validate([
            'phone' => ['nullable', 'string', 'max:30'],
            'gender' => ['nullable', 'string', 'max:20'],
            'date_of_birth' => ['nullable', 'date', 'before_or_equal:today'],
            'marital_status' => ['nullable', 'string', 'max:30'],
            'occupation' => ['nullable', 'string', 'max:255'],
            'blood_group' => ['nullable', 'string', 'max:10'],
            'address' => ['nullable', 'string', 'max:255'],
            'city' => ['nullable', 'string', 'max:255'],
            'country' => ['nullable', 'string', 'max:255'],
            'emergency_contact_name' => ['nullable', 'string', 'max:255'],
            'emergency_contact_phone' => ['nullable', 'string', 'max:30'],
            'allergies' => ['nullable', 'string'],
            'medical_history' => ['nullable', 'string'],
            'notes' => ['nullable', 'string'],
        ]);

        $user->patientDetail()->updateOrCreate(['user_id' => $user->id], $validated);

        return redirect()
            ->route('user.patient-details.edit')
            ->with('success', 'Details updated successfully.');
    }
}
