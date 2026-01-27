<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        return redirect()->route('admin.users.patients');
    }

    public function admins()
    {
        $admins = User::role('admin')
            ->latest()
            ->paginate(20);

        return view('backend.users.admins', compact('admins'));
    }

    public function patients()
    {
        $patients = User::role('user')
            ->latest()
            ->paginate(20);

        return view('backend.users.patients', compact('patients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        $user->load(['roles', 'permissions', 'patientDetail']);

        return view('backend.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */


    public function edit(User $user)
    {
        $user->load(['roles', 'permissions', 'patientDetail']);

        $roles = Role::orderBy('name')->get();
        $permissions = Permission::orderBy('name')->get();

        return view('backend.users.edit', compact('user', 'roles', 'permissions'));
    }


    /**
     * Update the specified resource in storage.
     */


    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email,' . $user->id],
            'status' => ['required', 'in:active,inactive,suspended'],
            'role' => ['required', 'exists:roles,name'],
            'permissions' => ['nullable', 'array'],
            'permissions.*' => ['exists:permissions,name'],
            'patient_phone' => ['nullable', 'string', 'max:30'],
            'patient_gender' => ['nullable', 'string', 'max:20'],
            'patient_date_of_birth' => ['nullable', 'date', 'before_or_equal:today'],
            'patient_marital_status' => ['nullable', 'string', 'max:30'],
            'patient_occupation' => ['nullable', 'string', 'max:255'],
            'patient_blood_group' => ['nullable', 'string', 'max:10'],
            'patient_address' => ['nullable', 'string', 'max:255'],
            'patient_city' => ['nullable', 'string', 'max:255'],
            'patient_country' => ['nullable', 'string', 'max:255'],
            'patient_emergency_contact_name' => ['nullable', 'string', 'max:255'],
            'patient_emergency_contact_phone' => ['nullable', 'string', 'max:30'],
            'patient_allergies' => ['nullable', 'string'],
            'patient_medical_history' => ['nullable', 'string'],
            'patient_notes' => ['nullable', 'string'],
        ]);

        DB::transaction(function () use ($user, $validated) {
            $user->update([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'status' => $validated['status'],
            ]);

            // Sync roles and permissions
            $user->syncRoles($validated['role'] ?? []);
            $user->syncPermissions($validated['permissions'] ?? []);

            $patientData = [
                'phone' => $validated['patient_phone'] ?? null,
                'gender' => $validated['patient_gender'] ?? null,
                'date_of_birth' => $validated['patient_date_of_birth'] ?? null,
                'marital_status' => $validated['patient_marital_status'] ?? null,
                'occupation' => $validated['patient_occupation'] ?? null,
                'blood_group' => $validated['patient_blood_group'] ?? null,
                'address' => $validated['patient_address'] ?? null,
                'city' => $validated['patient_city'] ?? null,
                'country' => $validated['patient_country'] ?? null,
                'emergency_contact_name' => $validated['patient_emergency_contact_name'] ?? null,
                'emergency_contact_phone' => $validated['patient_emergency_contact_phone'] ?? null,
                'allergies' => $validated['patient_allergies'] ?? null,
                'medical_history' => $validated['patient_medical_history'] ?? null,
                'notes' => $validated['patient_notes'] ?? null,
            ];

            $hasPatientData = collect($patientData)->filter(function ($value) {
                return $value !== null && $value !== '';
            })->isNotEmpty();

            $shouldSyncPatient = ($validated['role'] ?? '') === 'user'
                && ($hasPatientData || $user->patientDetail);

            if ($shouldSyncPatient) {
                $user->patientDetail()->updateOrCreate(['user_id' => $user->id], $patientData);
            }
        });

        $route = ($validated['role'] ?? '') === 'admin'
            ? 'admin.users.admins'
            : 'admin.users.patients';

        return redirect()
            ->route($route)
            ->with('success', 'User updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $redirectRoute = $user->hasRole('admin')
            ? 'admin.users.admins'
            : 'admin.users.patients';

        $user->delete();

        return redirect()
            ->route($redirectRoute)
            ->with('success', 'User deleted successfully.');
    }
}
