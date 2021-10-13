@extends('admin.layouts.app')

@section("content")
<div class="container">
    <div class="row mb-3">
        <div class="col-sm-3">
            <a class="btn btn-primary" href="{{ route('category.create')}}">Agregar</a>
        </div>
        <div class="col-sm-8">
            <form class="form-inline" method="GET" action="{{route('category.index')}}">
                <div class="form-group" >
                    <label for="inputPassword6">Nombre</label>
                    <input type="text" name="search" class="form-control mx-sm-3" aria-describedby="passwordHelpInline">
                </div>
                <button class="btn btn-success"><i class="fa fa-search" aria-hidden="true"></i></button>
            </form>

        </div>

    </div>
    <table class="table">
    <thead>
        <tr>
        <th scope="col">ID</th>
        <th scope="col">Nombre</th>
        <th scope="col">Acción</th>
      
        </tr>
    </thead>
        <tbody>
            @foreach($categories as $category)
                <tr>
                    <th scope="row">{{$category->id}}</th>
                    <td>{{$category->categoryName}}</td>
                    <td>
                        <form  class="form-material form-delete"  action="{{ route('category.destroy', $category->id)}}", method="POST">
                            <a class="btn waves-effect waves-light btn-danger" href="{{ route('category.edit', $category->id)}}"><i class="fa fa-pencil"></i></a>
                            @csrf
                            @method("DELETE")
                            <button type="submit" class="btn waves-effect waves-light btn-success"><i class="fa fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
           
        </tbody>
    </table>
@if($containsPaginate)
    <div class="d-flex justify-content-center">
        {!! $categories->links() !!}
    </div>
@endif
</div>
@include('sweetalert::alert')
@endsection