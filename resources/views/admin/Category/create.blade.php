@extends('admin.layouts.app')

@section("content")
<div class="container">
    <h4 class="text-center">Crear nueva categoria</h4>
    <form method="POST" action="{{route('category.store')}}">
        @csrf
        <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Nombre</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputEmail3" name="categoryName" value="{{old('categoryName')}}" placeholder="Nombre">
            </div>
            @error("categoryName")
                <label class="text-danger text-center">{{ $message }}</label>
            @enderror
        </div>
        <div class="form-group row">
            <div class="col-sm-10">
            <button type="submit" class="btn btn-primary">Crear</button>
            </div>
        </div>
    </form>
</div>
@include('sweetalert::alert')
@endsection