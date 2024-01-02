<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Post;
use App\Models\PostCategory;
use App\Models\Category;
use App\Library\ImageManager;

class PostController extends Controller{

    public function storePost(Request $request)
    {
        // Validate the request data
        $request->validate([
            'PostTitle' => 'required|string|max:255',
            'PostDescription' => 'required|string|max:3000',
            'file.*' => 'file|mimetypes:video/*,image/*|max:20480' // Allow both images and videos, adjust max size if needed // Allow multiple files
            // Add validation rules for other fields
        ]);
        $filePath = "";
        // Save the attachments if provided
        if ($request->hasFile('file')) {
            
            $attachmentFileNames = [];
    
            foreach ($request->file('file') as $file) {
                // Move each file to a specific directory
                //$fileName = $file->store('claim_attachments');
                // Or perform other actions as needed
               
                $attachmentFileNames[] = ImageManager::upload('post_thumbnail/', $file->getClientOriginalExtension(), $file);
            }
    
            $filePath = json_encode($attachmentFileNames);
        }

        
        // Create a new Post instance using create method
        $post = Post::create([
            'PostTitle' => $request->input('PostTitle'),
            'PostDescription' => $request->input('PostDescription'),
            'PostMedia' => $request->input('PostMedia'),
            'PostMediaType' => $request->input('PostMediaType'),
            'PostThumb' => $filePath,
            'categoryId'=> $request->input('categoryId')
        ]);

        $categories = Category::pluck('CategoryTitle', 'id');

        if ($post) {
            // Post added successfully
            $success = ['Post added successfully!'];
            return view('admin-views.post.add-post', compact('success','categories'));
        } else {
            // Error: Post ID is not greater than 1
            $error = ['Error adding post. Please try again !...'];
            return view('admin-views.post.add-post', compact('error','categories'));
        }
    }
}