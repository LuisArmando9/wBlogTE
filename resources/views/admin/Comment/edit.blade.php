@extends('admin.layouts.app')

@section("content")
<x-adminlte-card title="Comentarios" theme="lightblue" theme-mode="outline"
    icon="fas fa-lg  fa-comments " class="mt-2">
<div class="container">
    
    <h4 class="text-center"> 
        <b>{{strtoupper($comment->userName)}}</b>
        {{('PUBLICÓ UN NUEVO COMENTARIO')}} 
    </h4>
    <p>
        Descripción del post: {{$post->title}}
    </p>
    <p>
        Comentario: {{$comment->comment}}
    </p>
    <p>
        Email del autor: {{$comment->email}}
    </p>
    <div class="row">
        <div class="col-1">
            <form method="POST" action="{{route('comment.update', $comment->id)}}">
                @csrf
                @method("PUT")
                <input type="hidden" name="active" value="1" >
                <button  type="submit" class="btn btn-lg btn-outline-primary"><i class="fa fa-check" aria-hidden="true"></i></button>
            </form>
        </div>
        <div class="col-1">
            <form method="POST" action="{{route('comment.update', $comment->id)}}">
                @csrf
                @method("PUT")
                <input type="hidden" name="active" value="0" >
                <button  type="submit" class="btn btn-lg btn-outline-danger"><i class="fa fa-times" aria-hidden="true"></i></button>
            </form>
        </div>
        <div class="col-1">
            <form method="POST"  class="form-delete" action="{{route('comment.destroy', $comment->id)}}">
                @csrf
                @method("DELETE")
                <button  type="submit" class="btn  btn-lg btn-outline-success"><i class="fa fa-trash" aria-hidden="true"></i></button>
            </form>
        </div>
        
    </div>
</div>
</x-adminlte-card>

@endsection