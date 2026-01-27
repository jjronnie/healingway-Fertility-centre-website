<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Service;
use App\Models\Staff;
use App\Http\Requests\StoreAppointmentRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{
    // ---------------------------
    // User methods
    // ---------------------------

    // List appointments for the logged-in user
    public function indexUser()
    {
        $userId = auth()->id();

        $relations = ['user', 'service', 'staff', 'confirmedBy', 'completedBy', 'cancelledBy'];

        $upcoming = Appointment::with($relations)
            ->where('user_id', $userId)
            ->whereIn('status', ['pending', 'confirmed'])
            ->orderBy('appointment_date')
            ->get();

        $completed = Appointment::with($relations)
            ->where('user_id', $userId)
            ->where('status', 'completed')
            ->orderBy('appointment_date')
            ->get();

        $cancelled = Appointment::with($relations)
            ->where('user_id', $userId)
            ->where('status', 'cancelled')
            ->orderBy('appointment_date')
            ->get();

        return view('backend.appointments.user.index', compact( 'upcoming', 'completed', 'cancelled'));
    }

    // Show create form
    public function create()
    {
        $services = Service::all();
        $staff = Staff::all();

        return view('backend.appointments.user.create', compact('services', 'staff'));
    }

    // Store new appointment
    public function store(StoreAppointmentRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = Auth::id();

        Appointment::create($data);

        return redirect()->route('user.appointments.index')->with('success', 'Appointment booked successfully.');
    }

    // Show edit form
    public function edit(Appointment $appointment)
    {
        if ($appointment->user_id !== Auth::id()) {
            abort(403);
        }

        if ($appointment->status !== 'pending') {
            return redirect()->route('user.appointments.index')->with('error', 'Cannot edit confirmed or completed appointments.');
        }

        $services = Service::all();
        $staff = Staff::all();

        return view('backend.appointments.user.edit', compact('appointment', 'services', 'staff'));
    }

    // Update appointment
    public function update(StoreAppointmentRequest $request, Appointment $appointment)
    {
        if ($appointment->user_id !== Auth::id()) {
            abort(403);
        }

        if ($appointment->status !== 'pending') {
            return redirect()->route('user.appointments.index')->with('error', 'Cannot edit confirmed or completed appointments.');
        }

        $appointment->update($request->validated());

        return redirect()->route('user.appointments.index')->with('success', 'Appointment updated successfully.');
    }





    // ---------------------------
    // Admin methods
    // ---------------------------

    // List all appointments
    public function indexAdmin()
    {
        $appointments = Appointment::with([
            'user',
            'service',
            'staff',
            'confirmedBy',
            'completedBy',
            'cancelledBy',
        ])->latest()->paginate(20);
        return view('backend.appointments.admin.index', compact('appointments'));
    }

    // Update status (confirm, cancel, complete)
    public function updateStatus(Request $request, Appointment $appointment)
    {


        $request->validate([
            'status' => 'required|in:pending,confirmed,cancelled,completed',
            'cancel_reason' => 'required_if:status,cancelled|string|max:255',
        ]);


        $userId = auth()->id();

        switch ($request->status) {
            case 'confirmed':
                $appointment->update([
                    'status' => 'confirmed',
                    'confirmed_at' => now(),
                    'confirmed_by' => $userId,
                ]);
                break;

            case 'completed':
                $appointment->update([
                    'status' => 'completed',
                    'completed_at' => now(),
                    'completed_by' => $userId,
                ]);
                break;

            case 'cancelled':
                $appointment->update([
                    'status' => 'cancelled',
                    'cancelled_at' => now(),
                    'cancelled_by' => $userId,
                    'cancel_reason' => $request->cancel_reason,
                ]);
                break;

            default:
                // pending doesn't require tracking
                $appointment->update([
                    'status' => 'pending',
                ]);
                break;
        }

        return redirect()->route('admin.appointments.index')->with('success', 'Appointment status updated.');
    }


}
