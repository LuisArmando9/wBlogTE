<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    const RULES = [
        "email" => "required|email",
        "userName" => "required|alpha_spaces|min:5|max:255",
        "comment" => "required|string|min:30|max:255",
        "postId" => "required|numeric|gt:0"
    ];
    const MAX_COMMENTS_FOR_PAGINATING = 10;
    public function __construct()
    {
        $this->middleware('auth')->only(['edit', 'update', 'index', 'destroy']);
        
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view("admin.Comment.index")
        ->with("comments",  Comment::paginate(self::MAX_COMMENTS_FOR_PAGINATING));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
   

        $request->validate(self::RULES);
        $id = $request['postId'];
        Post::findOrfail($id);
        $request["active"] = 1;
        Comment::create($request->all());
        return 
        back()
        ->with("toast_success",
         "Se ha creado el comentario, se debe validar por un administrador.");


        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        $this->middleware("auth");
        $post = Post::where("id", $comment->postId)->first(["title"]);
        return view("admin.Comment.edit")
        ->with("comment", $comment)
        ->with("post", $post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        $this->middleware(["auth"]);
        $request->validate(["active" => "required|boolean"]);
        $comment->update($request->all());
        return redirect()->route("post.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        
        $comment->delete();
        return redirect()->route("post.index");
    }
}
