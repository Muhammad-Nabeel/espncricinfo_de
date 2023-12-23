<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;


class WebController extends Controller
{
    public function home()
    {
        return view('web-views.home');
    }

    public function about_us()
    {
        return view('web-views.about-us');
    }

    public function services()
    {
        return view('web-views.services');
    }

    public function contact_us()
    {
        return view('web-views.contact-us');
    }
}