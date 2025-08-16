<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        return view('frontend.pages.home');
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
       return view('frontend.pages.services');
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

   

        public function showService()
    {
        return view('welcome');
    }

        public function showDoctor()
    {
        return view('welcome');
    }
}
