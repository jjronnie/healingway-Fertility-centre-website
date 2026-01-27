<?php

namespace App\Http\Controllers;

use App\Charts\SignupMethodChart;
use App\Charts\AppointmentStatusChart;
use App\Charts\AppointmentsByMonthChart;
use App\Charts\AppointmentsByServiceChart;

class ReportController extends Controller
{
    public function index()
    {
        $signupMethodChart = new SignupMethodChart();
        $appointmentStatusChart = new AppointmentStatusChart();
        $appointmentsByMonthChart = new AppointmentsByMonthChart();
        $appointmentsByServiceChart = new AppointmentsByServiceChart();

        return view('backend.reports.index', compact(
            'signupMethodChart',
            'appointmentStatusChart',
            'appointmentsByMonthChart',
            'appointmentsByServiceChart'
        ));
    }
}
