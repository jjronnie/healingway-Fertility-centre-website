<?php

namespace App\Http\Controllers;
use \App\Models\Service;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
         $services = Service::all();
        return view('frontend.pages.home',compact('services'));
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
        return view('frontend.pages.team');
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

        public function showDoctor()
    {
        return view('welcome');
    }
}
