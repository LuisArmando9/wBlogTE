@extends('admin.layouts.app')

@section("content")
<div class="container">
    <h3 class="text-center">POST</h3>
    <div class="row mb-3">
        <div class="col-sm-3">
            <a class="btn btn-primary" href="{{ route('post.create')}}">Agregar</a>
        </div>
        <div class="col-sm-8">
            <form class="form-inline" method="GET" action="{{route('post.index')}}">
                <div class="form-group">
                    <label for="inputPassword6">Titulo</label>
                    <input type="text"  name="search" id="inputPassword6" class="form-control mx-sm-3" aria-describedby="passwordHelpInline">
                </div>
                <button class="btn btn-success">Buscar</button>
            </form>

        </div>

    </div>

    <table class="table">
    <thead>
        <tr>
        <th scope="col">id</th>
        <th scope="col">Titulo</th>
        <th scope="col">Activo</th>
        <th scope="col">Reseña</th>
        <th scope="col">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($posts as $post)
            <tr>
                <th scope="row">{{$post->id}}</th>
                <td>{{$post->title}}</td>
                <td>
                    @if($post->active)
                        <i class="fa fa-check" aria-hidden="true"></i>
                    @else
                        <i class="fa fa-times" aria-hidden="true"></i>
                    @endif

                </td>
                <td>
                    {{$post->brief}}
                </td>
                <td>
                    <form  class="form-material form-delete"  action="{{ route('post.destroy', $post->id)}}", method="POST">
                        <a class="btn waves-effect waves-light btn-danger" href="{{ route('post.edit', $post->id)}}"><i class="fa fa-pencil"></i></a>
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
            {{$posts->links()}}
        </div>
    @endif
</div>
@include('sweetalert::alert')
@endsection