<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;


class DashboardController extends Controller
{

    public function __construct()
    {
        
    }

    public function dashboard()
    {
        $success = ['Welcome to Admin Dashboard'];
        return view('admin-views.system.dashboard',compact('success'));
    }

    public function add_post()
    {
        $categories = Category::pluck('CategoryTitle', 'id');
        return view('admin-views.post.add-post', compact('categories'));
    }
}