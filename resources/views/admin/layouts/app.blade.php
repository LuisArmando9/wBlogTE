@extends('adminlte::page')
@section('css')

    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <link href="{{asset('css/custom.css')}}" rel="stylesheet">
 
@stop
@section('js')
<script src="{{ mix('js/app.js') }}" ></script>
    <script src="{{asset('js/alert.js')}}"></script>
    <script src="{{asset('js/upload.js')}}"></script>
        <script src="{{asset('js/checkbox.js')}}"></script>
        <script>
            $('#summernote').summernote({
                height: 400
            });
    </script>
@stop