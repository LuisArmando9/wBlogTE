@extends('admin.layouts.app')
@section("content")
<x-adminlte-card title="Editar: {{$post->title}}" theme="lightblue" theme-mode="outline"
    icon="fas fa-lg  fa-bookmark " class="mt-2">
<div class="container">
    <form method="POST" action="{{route('post.update', $post->id)}}" enctype="multipart/form-data">
        @csrf
        @method("PUT")
        <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Titulo</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="title" value="@error('title'){{old('title')}}@else{{$post->title}}@enderror">
            </div>
            @error("title")
                <label class="text-danger text-center">{{ $message }}</label>
            @enderror
        </div>
        <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Reseña</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="brief" value="@error('brief'){{old('brief')}}@else{{$post->brief}}@enderror">
            </div>
            @error("brief")
                <label class="text-danger text-center">{{ $message }}</label>
            @enderror
        </div>
        <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Categoria</label>
            <div class="col-sm-10">
                <x-adminlte-select2  name="categoryId" >
                    @foreach($categories as $category)
                       @if($category->id == $post->categoryId)
                            <option value="{{$category->id}}" selected>{{$category->categoryName}}</option>
                       @else
                            <option value="{{$category->id}}">{{$category->categoryName}}</option> 
                       @endif
                    @endforeach
                </x-adminlte-select2>

            </div>
            @error("categoryId")
                <label class="text-danger text-center">{{ $message }}</label>
            @enderror
        </div>
        <div class="form-group mt-5">
            <h4 class="text-center">Contenido</h4>
            <textarea class="form-control" name="content" id="summernote">
                @error('content')
                    {{old('content')}}
                @else
                    {{$post->content}}
                @enderror
            </textarea>
            @error("content")
                <label class="text-danger text-center">{{ $message }}</label>
            @enderror
        </div>
        <div class="form-group__file mb-3">
            <label for="imageUpload" class="file-label">Imagen</label>
          
        
            <div class="file-wrapper">
                <input type="file" name="image" id="imageUpload" class="file-input" value="{{old('image')}}"/> 
                <div class="file-preview-background">Upload Image</div>
                <img src="" id="imagePreview" width="200px" class="file-preview"/>
            </div>
        
            @error("image")
                <label class="text-danger text-center">{{ $message }}</label>
            @enderror
        </div>
        <div class="form-check">
            <input class="form-check-input" id="ckd-active" type="checkbox" value="{{$post->active}}" name="active"  {{($post->active == 1 ? ' checked' : '') }}>
            <label class="form-check-label" for="flexCheckDefault">
                Activo
            </label>
            @error("active")
                <br>
                <label class="text-danger text-center">{{ $message }}</label>
            @enderror
        </div>
        
        <div class="form-group row">
            <div class="col-sm-10">
            <button type="submit" class="btn btn-primary">Actualizar</button>
            </div>
        </div>
    </form>
</div>
</x-adminlte-card>
@include('sweetalert::alert')
@endsection

