<!DOCTYPE html>
<html lang="fr">
<head>
  <title>Kuti Kuti</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Local -->
  <link rel="stylesheet" href="{{URL::asset('css/bootstrap.min.css')}}">
  <!-- CDN -->
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
  <!-- font-family: 'Chivo', sans-serif; -->
  <link href="https://fonts.googleapis.com/css?family=Chivo" rel="stylesheet">
  <link href="{{URL::asset('css/style.css')}}" rel="stylesheet">
  <!-- CSS aditionnel -->
  @stack('css')
</head>
<body>
    @include('layouts.nav')

    @if(Auth::check())
    <div class="container">
      @include('layouts.admin_nav')
    </div> 
    @endif


@yield('content')

 <div class="container-fluid r-p">

        <hr>

        <!-- Footer -->
      @include('layouts.footer')
</div>
    
    <!-- Local -->
    <script src="{{URL::asset('js/jquery-3.2.1.min.js')}}"></script>
    <script src="{{URL::asset('js/bootstrap.min.js')}}"></script>
    <!-- CDN -->
    <!-- <script  src="https://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->
    <!-- JS pour l'Ajax -->
    <script src="{{URL::asset('js/login.js')}}"></script>
    <!-- JS aditionnel -->
    @stack('js')
</body>
</html>
