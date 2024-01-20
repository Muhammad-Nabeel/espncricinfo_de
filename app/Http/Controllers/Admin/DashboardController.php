<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;


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

    public function post_list()
    {
        $categories = Category::pluck('CategoryTitle', 'id');
        $posts = Post::all(); // Retrieve all posts
        return view('admin-views.post.post-list', compact('categories', 'posts'));
    }
    
}