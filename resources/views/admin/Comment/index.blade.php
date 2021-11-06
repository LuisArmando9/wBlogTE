@extends('admin.layouts.app')

@section("content")
<x-adminlte-card title="Comentarios" theme="lightblue" theme-mode="outline"
    icon="fas fa-lg  fa-comments " class="mt-2">
<div class="container">
    <h3>Comentarios</h3>
    <table class="table table-responsive-md">
        <thead>
            <tr>
         
                <th scope="col">Autor</th>
                <th scope="col">Comentario</th>
                <th scope="col">Estado</th>
                <th scope="col"> Fecha</th>
                <th scope="col">Titulo del post</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
           
            @foreach($comments as $comment)
                <tr>
                    <th scope="row">{{$comment->userName}}</th>
                    <td>{{$comment->comment}}</td>
                    <td >
                        @if($comment->active)
                            <span class="bg-info p-1 text-white" ><i class="fas fa-check"></i></span>
                        @else
                            <span class="bg-danger p-1 text-white"><i class="fas fa-times"></i></span>
                        @endif
                    </td>
                    <td>{{$comment->created_at}}</td>
                    <td>{{$comment->title}}</td>
                    <td class="col-md-2">
                        <a class="btn btn-outline-info" href="{{route('comment.edit', $comment->id)}}">
                            <i class="fa fa-pencil-alt" aria-hidden="true"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
          
            
        </tbody>
    </table>
    <div class="container">
        {!!$comments->links()!!}

    </div>

</div>
</x-adminlte-card> 
@include('sweetalert::alert')
@endsection