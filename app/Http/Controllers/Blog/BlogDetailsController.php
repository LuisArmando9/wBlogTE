<?php

namespace App\Http\Controllers\Blog;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Category;

class BlogDetailsController extends Controller
{
    public function index($id){
        $post = Post::findOrFail($id); 
        $comments = Comment::where("postId", $id)->where("active", "0")->get();
        $category =   Category::where("id", $post->categoryId)->first();
        $categories =  Category::get();
        $lastPosts = Post::orderByDesc("created_at")
        ->skip(IndexController::INDEX_POST)
        ->take(IndexController::MAX_POSTS)
        ->get();
        return view("blog.blog-details")
        ->with("post", $post)
        ->with("comments", $comments)
        ->with("category", $category)
        ->with("categories",$categories)
        ->with("lastPosts", $lastPosts);
    }
}
