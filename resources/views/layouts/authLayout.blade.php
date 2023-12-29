<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    {{-- <link href="{{ asset('img/sitelogo.png')}}" rel="stylesheet"> --}}

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<style>
.clr{
  background-color: red;
}
</style>

<body>
<div>
  <div class="row align-items-start">
    <div class="col-6 clr">
      @yield('content')
    </div>
    
    <div class="col-6" >
      <div style="background-image: url('img_girl.jpg');">
        {{-- <img src="{{ asset('img/logo.png') }}"class="img-fluid" alt=""> --}}
      </div>
    </div>
  </div>
</div>
</body>
</html>

    {{-- background: linear-gradient(
    to right, 
    #ffffff 0%, 
    #ffffff 50%, 
    red 50%, 
    red 100%
  ); --}}