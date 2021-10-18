@extends('admin.layouts.app')

@section("content")
<div class="container">
    <h3>Comentarios</h3>
    <table class="table table-responsive-md">
        <thead>
            <tr>
         
                <th scope="col">Autor</th>
                <th scope="col">Comentario</th>
                <th scope="col">Estado</th>
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
                            <span class="bg-danger p-2 text-white">NO ACEPTADO</span>
                        @else
                            <span class="bg-primary p-2 text-white" >ACEPTADO</span>
                        @endif
                    </td>
                    <td class="col-md-2">
                        <a class="btn btn-info" href="{{route('comment.edit', $comment->id)}}">
                            <i class="fa fa-pencil" aria-hidden="true"></i>
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
@include('sweetalert::alert')
@endsection