<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    function detail($slug){
        
        $posts = Post::where('slug', $slug)->first();
        // $title = $posts->name;
        return view('post.detail',compact('posts'));
    }
}
