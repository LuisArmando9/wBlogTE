<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ ('Blog') }}</title>
    <x-BlogLinks/>
    
</head>
<body>
    <!--Navbar-->
    <x-BlogNavbar/>
  
    <!--end navbar-->
    <!--header-->
    @yield("header")
    <!--end header-->
    <!---------MAIN CONTENT---->
    <section class="ftco-section bg-light">
        <div class="container">
            @yield("content")
        </div>
    </section>
    <!---------END CONTENT----->
    <!--footer-->
    <x-BlogFoooter/>
    <!--end footer-->
    @include('sweetalert::alert')
</body>

<x-BlogScripts/>
@yield("custom-scripts")
</html>
