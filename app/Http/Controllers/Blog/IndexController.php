<?php

namespace App\Http\Controllers\Blog;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post;
class IndexController extends Controller
{
    const MAX_POSTS = 6;
    const INDEX_POST = 0;
    public function index(){
        return view("blog.index")
        ->with("posts", 
        Post::orderByDesc("created_at")
        ->skip(self::INDEX_POST)
        ->take(self::MAX_POSTS)
        ->get()
        );
    }
}
