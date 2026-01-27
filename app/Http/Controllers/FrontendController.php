<?php

namespace App\Http\Controllers;

use \App\Models\Service;
use App\Models\Staff;
use App\Models\Event;
use Illuminate\Http\Request;
use Carbon\Carbon;

class FrontendController extends Controller
{
    public function index()
    {
        $services = Service::where('is_featured', true)->latest()->take(4)->get();
        $now = Carbon::now();

        $upcomingEvents = Event::where('status', 'published')
            ->where(function ($query) use ($now) {
                // Event date is in the future OR today but time not passed
                $query->where('event_date', '>', $now->toDateString())
                    ->orWhere(function ($q) use ($now) {
                    $q->where('event_date', $now->toDateString())
                        ->where('event_time', '>', $now->toTimeString());
                });
            })
            ->orderBy('event_date')
            ->orderBy('event_time')
            ->take(3)
            ->get();


        $staff = Staff::orderBy('display_position')->orderBy('name')->take(4)->get();
        return view('frontend.pages.home', compact('services', 'staff', 'upcomingEvents'));
    }

    public function about()
    {


        return view('frontend.pages.about');
    }

    public function contact()
    {
        return view('frontend.pages.contact');
    }

    public function services()
    {
        $services = Service::all();
        return view('frontend.pages.services', compact('services'));
    }


    public function events()
    {
        $today = Carbon::today();

        // Upcoming events, today and future
        $upcomingEvents = Event::where('status', 'published')
            ->whereDate('event_date', '>=', $today)
            ->orderBy('event_date', 'asc')
            ->orderBy('event_time', 'asc')
            ->get();

        // Past events, before today
        $pastEvents = Event::where('status', 'published')
            ->whereDate('event_date', '<', $today)
            ->orderBy('event_date', 'desc')
            ->orderBy('event_time', 'desc')
            ->get();

        return view('frontend.pages.events', compact('upcomingEvents', 'pastEvents'));
    }


    public function team()
    {
        $staff = Staff::orderBy('display_position')->orderBy('name')->get();
        return view('frontend.pages.team', compact('staff'));
    }

    public function resources()
    {
        return view('frontend.pages.resources');
    }


    public function appointment()
    {
        return view('frontend.pages.appointment');
    }



    public function showService($slug)
    {
        $service = Service::where('slug', $slug)->firstOrFail();

        return view('frontend.pages.show-service', compact('service'));
    }

    public function showEvent($slug)
    {
        $event = Event::where('slug', $slug)
        ->where('status', 'published')
        ->firstOrFail();

        return view('frontend.pages.show-event', compact('event'));
    }



    public function showStaff($slug)
    {
        $staff = Staff::where('slug', $slug)->firstOrFail();
        return view('frontend.pages.show-staff', compact('staff'));
    }
}
