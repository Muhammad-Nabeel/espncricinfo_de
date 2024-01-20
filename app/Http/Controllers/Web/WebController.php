<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Post;


class WebController extends Controller
{
    public function home()
    {
        try {
            // Get all posts and order them by the latest
            $posts = Post::orderBy('created_at', 'desc')->get();
            return view('web-views.home', ['posts' => $posts]);
        } catch (\Exception $ex) {
            return response()->json(['error' => 'An error occurred.'], 500);
        }
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