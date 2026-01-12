<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use App\Models\User;
use App\Charts\SignupMethodChart;



class DashboardController extends Controller
{
   public function index()
{
    $adminTotal = User::role('admin')->count();

    $userTotal = User::role('user')->count();
    $totalServices = Service::count();

    $signupMethodChart = new SignupMethodChart();

    return view('dashboard', compact('adminTotal', 'userTotal', 'totalServices', 'signupMethodChart'));
}

}
