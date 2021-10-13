@extends('admin.layouts.app')

@section("content")
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
                <input type="number" name="active" value="0" style="display: none;">
                <button  type="submit" class="btn btn-primary"><i class="fa fa-check" aria-hidden="true"></i></button>
            </form>
        </div>
        <div class="col-1">
            <form method="POST" action="{{route('comment.update', $comment->id)}}">
                @csrf
                @method("PUT")
                <input type="number" name="active" value="1" style="display: none;">
                <button  type="submit" class="btn btn-danger"><i class="fa fa-times" aria-hidden="true"></i></button>
            </form>
        </div>
        <div class="col-1">
            <form method="POST" action="{{route('comment.destroy', $comment->id)}}">
                @csrf
                @method("DELETE")
                <button  type="submit" class="btn btn-success"><i class="fa fa-trash" aria-hidden="true"></i></button>
            </form>
        </div>
        
    </div>
</div>

@endsection