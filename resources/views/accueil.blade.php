<!DOCTYPE html>
<html lang="en">
<head>
  <title>Kuti Kuti</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="{{URL::asset('css/style.css')}}" rel="stylesheet">
</head>
<body>
    @include('layouts.nav')
    
    <!-- Page Content -->
    <div class="container-fluid" id="main">
        
        <div class="logo">
            <img src="img/logo.png">
        </div>

        <div class="row r-m">

            <div class="col-md-12">

                <div class="row carousel-holder">

                    <div class="col-md-12 slider">
                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="item active">
                                    <img class="slide-image" src="{{URL::asset('img/background.jpeg')}}" alt="">
                                    <div class="info-carrousel_a">Kutì Kutì <br>est un jeu d'assemblage interactif et <br>lumineux à partir de 8 ans</div>
                                </div>
                                <div class="item">
                                    <img class="slide-image" src="{{URL::asset('img/background1.jpeg')}}" alt="">
                                     <div class="info-carrousel_b">Kutì Kutì <br>est un jeu d'assemblage interactif et <br>lumineux à partir de 8 ans</div>
                                </div>
                                <div class="item">
                                    <img class="slide-image" src="{{URL::asset('img/background2.jpeg')}}" alt="">
                                     <div class="info-carrousel_c">Kutì Kutì <br>est un jeu d'assemblage interactif et <br>lumineux à partir de 8 ans</div>
                                </div>
                            </div>
                            <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left"></span>
                            </a>
                            <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right"></span>
                            </a>
                        </div>
                    </div>

                </div>

            </div>

        </div>

    </div>
    <!-- /.container -->

    <div class="container">

        <hr>

        <!-- Footer -->
      @include('layouts.footer')

    </div>
    <!-- /.container -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</body>
</html>