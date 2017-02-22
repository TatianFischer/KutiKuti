<!DOCTYPE html>
<html lang="en">
<head>
  <title>Kuti Kuti</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- font-family: 'Chivo', sans-serif; -->
  <link href="https://fonts.googleapis.com/css?family=Chivo" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="{{URL::asset('css/style.css')}}" rel="stylesheet">
  <!-- CSS aditionnel -->
  @stack('css')
</head>
<body>
    @include('layouts.nav')

@yield('content')

 <div class="container">

        <hr>

        <!-- Footer -->
      @include('layouts.footer')
</div>
    

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</body>
</html>


