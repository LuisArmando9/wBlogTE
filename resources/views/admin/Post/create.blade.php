@extends('admin.layouts.app')
@section("content")
<x-adminlte-card title="Nueva publicación" theme="lightblue" theme-mode="outline"
    icon="fas fa-lg  fa-bookmark " class="mt-2">
<div class="container">
    <form method="POST" action="{{route('post.store')}}" enctype="multipart/form-data">
        @csrf
        <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Titulo</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="title" value="{{old('title')}}">
            </div>
            @error("title")
                <label class="text-danger text-center">{{ $message }}</label>
            @enderror
        </div>
        <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Reseña</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="brief" value="{{old('brief')}}">
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
                        <option value="{{$category->id}}">{{$category->categoryName}}</option>
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
                {{old('brief')}}
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
                <img src="{{old('image')}}" id="imagePreview" width="200px" class="file-preview"/>
            </div>
            @error("image")
                <label class="text-danger text-center">{{ $message }}</label>
            @enderror
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="active" valeu="{{old('active')}}" id="ckd-active">
            <label class="form-check-label" for="flexCheckDefault">
                Activo
            </label>
        </div>
        
        <div class="form-group row">
            <div class="col-sm-10">
            <button type="submit" class="btn btn-outline-primary">Crear</button>
            </div>
        </div>
    </form>
</div>
</x-adminlte-card>
@include('sweetalert::alert')
@endsection
@section('js')
    <script src="{{asset('js/upload.js')}}"></script>
        <script src="{{asset('js/checkbox.js')}}"></script>
        <script>
            $('#summernote').summernote({
                height: 400
            });
    </script>
@stop