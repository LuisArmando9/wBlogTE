<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class CategoryController extends Controller
{
    const RULES =[
        "categoryName" => "alpha_spaces|required|max:255|min:5"
    ];
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
     
        $search = $request->get("search");
        if(is_null($search)){
            return view("admin.Category.index")
            ->with("categories",  Category::paginate())
            ->with("containsPaginate", true);
        }
        $response = $request->all();
        $search = $response['search'];
        $validator = Validator::make($response, ["search" => "required|alpha_spaces|string"]);
        if($validator->fails()){
            return redirect()->route("category.index")
            ->with("toast_error", "El texto ingresado es invalido");
        }
        return view("admin.Category.index")
        ->with("categories", Category::where("categoryName", "LIKE", "%$search%")->get())
        ->with("containsPaginate", false);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.Category.create");
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
        Category::create($request->all());
        return redirect()->route("category.index")->
        withSuccess("Se ha agregado un nueva categoria: <b>{$request['categoryName']}</b>");
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::findOrfail($id);
        return view("admin.Category.edit")
        ->with("category", $category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $request->validate(self::RULES);
        $category->update($request->all());
        return redirect()->route("category.index")
        ->with("toast_success", "se ha actualizado la categoria: {$category->categoryName}");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        try{
            $category->delete();
        }catch(\Exception $ex){
            return redirect()->route("category.index")
            ->with('toast_error', 'No se puede eliminar, verifiqué las dependencias!');
        }
        return redirect()->route("category.index")
        ->withSuccess('Se ha eliminado correctemente la categoria.');;
    }
}
