
@extends('admin.layouts.app')

@section("content")

<x-adminlte-card title="Categorias" theme="lightblue" theme-mode="outline"
    icon="fas fa-lg  fa-list " class="mt-2">
    <div class="container">
        <div class="row mb-3">
            <div class="col-sm-2">
                
                <a class="btn btn-outline-primary p-2 " href="{{ route('category.create')}}"><i class="fas fa-plus"></i>  Agregar</a>
            </div>
            
            <div class="col-sm-8">
                <form class="form-inline" method="GET" action="{{route('category.index')}}">
                  
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
                                <a class="btn btn-outline-danger"  href="{{ route('category.edit', $category->id)}}"><i class="fa fa-pencil-alt"></i></a>
                                @csrf
                                @method("DELETE")
                                <button type="submit" class="btn btn-outline-success"><i class="fa fa-trash"></i></button>
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

</x-adminlte-card>
@include('sweetalert::alert')
@endsection