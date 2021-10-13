<?php

namespace App\Http\Controllers\Blog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Support\Facades\DB;
class BlogController extends Controller
{
    
    public function index(){
        $post = Post::join("category", "category.id", "=","post.categoryId")
                ->select("post.*", "category.categoryName")
                ->paginate();
        return view("blog.blog")
        ->with("posts", $post);
    }
}
