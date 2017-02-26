@extends('layouts.master')

@section('content')
<div class="container-fluid r-p content" id="main">

        <div class="row r-m">

            <div class="col-md-12">

                <div class="row carousel-holder">

                    <div class="col-md-12 slider r-p">
                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="item active">
                                    <img class="slide-image" src="{{URL::asset('img/image4.jpg')}}" alt="">
                                    <div class="info-carrousel_a">Kutì Kutì <br>est un jeu d'assemblage interactif et <br>lumineux à partir de 8 ans</div>
                                </div>
                                <div class="item">
                                    <img class="slide-image" src="{{URL::asset('img/image5.jpg')}}" alt="">
                                     <div class="info-carrousel_b">Kutì Kutì <br>est un jeu d'assemblage interactif et <br>lumineux à partir de 8 ans</div>
                                </div>
                                <div class="item">
                                    <img class="slide-image" src="{{URL::asset('img/image6.jpg')}}" alt="">
                                     <div class="info-carrousel_c">Kutì Kutì <br>est un jeu d'assemblage interactif et <br>lumineux à partir de 8 ans</div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>

    </div>
    <!-- /.container -->

@endsection

@push('js')
   <script type="text/javascript" src="{{URL::asset('js/aleatoire.js')}}"></script> 
@endpush