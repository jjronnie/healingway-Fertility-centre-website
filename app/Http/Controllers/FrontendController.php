<?php

namespace App\Http\Controllers;
use \App\Models\Service;
use App\Models\Staff;
use RalphJSmit\Laravel\SEO\Support\SEOData;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
     $services = Service::latest()->take(8)->get();
     $staff = Staff::orderBy('display_position')->orderBy('name')->take(4)->get();
        return view('frontend.pages.home',compact('services', 'staff'));
    }

        public function about()
    {
        

        return view('frontend.pages.about', compact('seoData'));
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

 

      public function  showStaff($slug)
    {
        $staff = Staff::where('slug', $slug)->firstOrFail();
        return view('frontend.pages.show-staff', compact('staff'));
    }
}
