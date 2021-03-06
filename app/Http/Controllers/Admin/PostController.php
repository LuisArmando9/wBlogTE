<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Category;
use Facade\FlareClient\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use Cloudder;
use Cloudinary;
use Cloudinary\Configuration\Configuration;
/*
CLOUDINARY DOCUMENTATION
https://github.com/cloudinary-labs/cloudinary-laravel
https://github.com/cloudinary-labs/cloudinary-laravel/blob/master/src/CloudinaryEngine.php
https://github.com/cloudinary-labs/cloudinary-laravel/blob/master/src/Facades/Cloudinary.php
*/

class PostController extends Controller
{
    const RULES =
    [
        "brief" =>"required|string|max:255|min:5",
        "title" => "required|string|max:255|min:5",
        "image" => "required|file|mimes:jpeg,png,jpg,gif,svg|max:1024",
        "active" => "required|boolean",
        "content" => "required|string",
        "categoryId" => "required|numeric|not_in:0|gt:0"

    ];
    public function __construct()
    {
        $this->middleware(["auth"]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private function getPublicId($url){
        $words = explode(',', $url);
        $name = $words[count($words)-1];
        $words = explode('.', $name);
        return "blog/{$words[0]}";
    }
    public function index(Request $request)
    {
        $search = $request->get("search");
        if(is_null($search)){
            return view("admin.Post.index")
            ->with("posts", Post::paginate())
            ->with("containsPaginate", true);
        }
        $response = $request->all();
        $search = $response['search'];
        $validator = Validator::make($response, ["search" => "required|alpha_spaces|string"]);
        if($validator->fails()){
            return redirect()->route("post.index")
            ->with("toast_error", "El texto ingresado es invalido");
        }
        return view("admin.Post.index")
        ->with("posts", Post::where("title", "LIKE", "%$search%")->get())
        ->with("containsPaginate", false);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::get();
        return view("admin.Post.create")
        ->with("categories", $categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
    public function store(Request $request)
    {

        if(is_null($request->post("active"))){
            $request["active"] = 0;
        }
        $request->validate(self::RULES);
        $response = $request->except(['_token']); 
        $result = $request->file("image")->storeOnCloudinary('blog');
        $response["image"] = str_replace("/",",", $result->getSecurePath());
        Post::create($response);
        return redirect()->route("post.index")->with('toast_success', 'Se ha creado un nuevo post');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view("admin.Post.edit")
        ->with("post", $post)
        ->with("categories", Category::get(["id", "categoryName"]));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $newRules =  self::RULES;
        if (!$request->hasFile("image")) { 
            unset($newRules["image"]);      
        }
        if(is_null($request->post("active"))){
            $request["active"] = 0;
        }
        $request->validate($newRules);
        $response = $request->except(['_token', "_method"]);
        if($request->hasFile("image")){
            Cloudinary::destroy($this->getPublicId($post->image));
            $result = $request->file("image")->storeOnCloudinary('blog');
            $response["image"] = str_replace("/",",", $result->getSecurePath());
        }
 
        $post->update($response);
        return redirect()->route("post.edit", $post->id)->with('toast_success', 'Se he actualizado correctamente');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        try{
            $post->delete();
        }catch(\Exception $ex){
            
            return redirect()->route("post.index")->with('toast_error', 'No se puede eliminar, verifiqu?? las dependencias!');
        }
        return redirect()->route("post.index")->withSuccess('Se ha eliminado correctemente el post');
       
        
    }
}
