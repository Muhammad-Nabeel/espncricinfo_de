<?php

namespace App\Http\Controllers\Web;

use App\Models\Category;
use App\Models\Post;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function category(Request $request, $categoryTitle = null)
    {
        try {
            $posts = Post::whereHas('category', function ($query) use ($categoryTitle) {
                // Adjust the foreign key and primary key here
                $query->where('CategoryTitle', $categoryTitle);
            })->get();
            return view('web-views.category', ['posts' => $posts]);
        } catch (\Exception $ex) {
            return response()->json(['error' => 'An error occurred.'], 500);
        }
    }

    public function post(Request $request, $category, $slug){
        // Retrieve the requested post
        $post = Post::with('category')
                    ->whereHas('category', function ($query) use ($category) {
                        $query->where('CategoryTitle', $category);
                    })
                    ->where('slug', $slug)
                    ->first();
    
        if (!$post) {
            // Handle case when post is not found
            abort(404);
        }
    
        // Retrieve related posts in the same category
        $relatedPosts = Post::with('category')
                        ->whereHas('category', function ($query) use ($category) {
                            $query->where('CategoryTitle', $category);
                        })
                        ->where('PostId', '!=', $post->id)
                        ->limit(100) // Adjust the limit as needed
                        ->get();
    
        // Do something with the $post and $relatedPosts, like passing them to a view
        return view('web-views.post', compact('post', 'relatedPosts'));
    }
    
}
