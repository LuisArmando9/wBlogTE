@extends('admin.layouts.app')

@section("content")
<x-adminlte-card title="Editar" theme="lightblue" theme-mode="outline"
    icon="fas fa-lg  fa-list " class="mt-2">
<div class="container">
    <h4 class="text-center">Editar categoria: {{$category->categoryName}}</h4>
    <form method="POST" action="{{route('category.update', $category->id)}}">
        @csrf
        @method("PUT")
        <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Nombre</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputEmail3" name="categoryName" value="@error('categoryName'){{old('categoryName')}}@else{{$category->categoryName}}@enderror" placeholder="Nombre">
            </div>
            @error("categoryName")
            <label class="text-danger text-center">{{ $message }}</label>
            @enderror
        </div>
        <div class="form-group row">
            <div class="col-sm-10">
            <button type="submit" class="btn btn-outline-primary">Actualizar</button>
            </div>
        </div>
    </form>
</div>
</x-adminlte-card>
@include('sweetalert::alert')
@endsection