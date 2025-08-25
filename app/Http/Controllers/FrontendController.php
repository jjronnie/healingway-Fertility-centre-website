<?php

namespace App\Http\Controllers;
use \App\Models\Service;
use App\Models\Doctor;


use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
     $services = Service::latest()->take(8)->get();
     $doctors = Doctor::orderBy('display_position')->orderBy('name')->take(4)->get();
        return view('frontend.pages.home',compact('services', 'doctors'));
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

        public function team()
    {
         $doctors = Doctor::orderBy('display_position')->orderBy('name')->get();
        return view('frontend.pages.team', compact('doctors'));
    }

            public function resources()
    {
        return view('frontend.pages.resources');
    }


            public function appointment()
    {
        return view('frontend.pages.appointment');
    }

   

        public function showService(Service $service)
    {
        return view('frontend.pages.show-service', compact('service'));
    }

 

      public function  showDoctor($slug)
    {
        $doctor = Doctor::where('slug', $slug)->firstOrFail();
        return view('frontend.pages.show-doctor', compact('doctor'));
    }
}
