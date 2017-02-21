@extends('layouts.master')

@section('content')
<div class="container-fluid" id="main">

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

@endsection

   