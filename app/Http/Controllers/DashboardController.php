<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Appointment;



class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        if ($user && $user->hasRole('user')) {
            $detail = $user->patientDetail;
            $profileFields = [
                'phone',
                'gender',
                'date_of_birth',
                'marital_status',
                'occupation',
                'blood_group',
                'address',
                'city',
                'country',
                'emergency_contact_name',
                'emergency_contact_phone',
                'allergies',
                'medical_history',
                'notes',
            ];

            $profileFieldsTotal = count($profileFields);
            $profileFieldsFilled = collect($profileFields)->filter(function ($field) use ($detail) {
                return $detail && filled($detail->{$field});
            })->count();
            $profileCompletion = $profileFieldsTotal > 0
                ? (int) round(($profileFieldsFilled / $profileFieldsTotal) * 100)
                : 0;

            $upcomingCount = Appointment::where('user_id', $user->id)
                ->whereIn('status', ['pending', 'confirmed'])
                ->count();

            $completedCount = Appointment::where('user_id', $user->id)
                ->where('status', 'completed')
                ->count();

            $cancelledCount = Appointment::where('user_id', $user->id)
                ->where('status', 'cancelled')
                ->count();

            $recentAppointments = Appointment::with(['service', 'staff'])
                ->where('user_id', $user->id)
                ->whereIn('status', ['pending', 'confirmed'])
                ->orderBy('appointment_date')
                ->take(3)
                ->get();

            return view('backend.dashboard.user', compact(
                'upcomingCount',
                'completedCount',
                'cancelledCount',
                'recentAppointments',
                'profileCompletion',
                'profileFieldsFilled',
                'profileFieldsTotal'
            ));
        }

        $adminTotal = User::role('admin')->count();
        $userTotal = User::role('user')->count();
        $totalServices = Service::count();
        $appointmentTotal = Appointment::count();
        $pendingAppointments = Appointment::where('status', 'pending')->count();
        $confirmedAppointments = Appointment::where('status', 'confirmed')->count();
        $completedAppointments = Appointment::where('status', 'completed')->count();
        $cancelledAppointments = Appointment::where('status', 'cancelled')->count();

        return view('dashboard', compact(
            'adminTotal',
            'userTotal',
            'totalServices',
            'appointmentTotal',
            'pendingAppointments',
            'confirmedAppointments',
            'completedAppointments',
            'cancelledAppointments'
        ));
    }
}
