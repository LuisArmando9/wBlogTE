@extends('admin.layouts.app')

@section("content")

<x-adminlte-card title="Publicaciones" theme="lightblue" theme-mode="outline"
    icon="fas fa-lg  fa-bookmark " class="mt-2">
    <div class="container">
        <div class="row mb-3">
            <div class="col-sm-2">
                
                <a class="btn btn-outline-primary p-2 " href="{{ route('post.create')}}"><i class="fas fa-plus"></i>  Agregar</a>
            </div>
            
            <div class="col-sm-8">
                <form class="form-inline" method="GET" action="{{route('post.index')}}">
                  
                    <x-adminlte-input name="search"  placeholder="Titulo de la publicación " igroup-size="md">
                        <x-slot name="appendSlot">
                            <x-adminlte-button type="submit"  theme="outline-primary" label="Buscar"/>
                        </x-slot>
                        <x-slot name="prependSlot">
                            <div class="input-group-text text-primary">
                                <i class="fas fa-search"></i>
                            </div>
                        </x-slot>
                    </x-adminlte-input>
                </form>

            </div>

        </div>
        <table class="table table-hover table-dark">
            <thead>
                <tr>
                <th scope="col">id</th>
                <th scope="col">Titulo</th>
                <th scope="col">Activo</th>
                <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
            <tbody >
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
                        
                        <td class="row">
                            <form  class="form-material form-delete"  action="{{ route('post.destroy', $post->id)}}", method="POST">
                                <a class="btn btn-outline-danger" href="{{ route('post.edit', $post->id)}}"><i class="fas fa-pencil-alt"></i></a>
                                @csrf
                                @method("DELETE")
                                <button type="submit"   class="btn btn-outline-success"><i class="fa fa-trash fa-fw fa-sm"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                
            </tbody>
            </tbody>
        </table>
       
        @if($containsPaginate)
            <div class="d-flex justify-content-center">
                {{$posts->links()}}
            </div>
        @endif
    </div>

</x-adminlte-card>
@include('sweetalert::alert')
@endsection

