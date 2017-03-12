@extends('layouts.master')

@section('content')
<div class="container-fluid r-p content" id="main">

        <div class="row r-m">

            <div class="col-md-12">

                <div class="row carousel-holder">

                    <div class="col-md-12 slider r-p">
                        <div id="carousel-accueil" class="carousel slide" data-ride="carousel">

                            <ol class="carousel-indicators">
                            	@for($i = 0; $i < count($carousels) ; $i++)
                                	<li data-target="#carousel-accueil" data-slide-to="{{$i}}" class="@if($i == 0){{'active'}}@endif"></li>
                                @endfor
                            </ol>

                            <div class="carousel-inner">
                            <?php $slide = 1; ?>
                            @foreach($carousels as $carousel)
                                <div class="item @if($slide == 1){{'active'}}@endif">
                                    <img class="slide-image" src="{{URL::asset('img/carousel/'.$carousel->picture)}}" alt="{{$carousel->alternative}}">
                                    <div class="info_carrousel {{$carousel->position_horizontal}} {{$carousel->position_vertical}}">{{$carousel->text}}</div>
                                </div>
                                <?php $slide++; ?>
							@endforeach
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>

</div>
    <!-- fin class container -->

@endsection

@push('js')
   <script type="text/javascript" src="{{URL::asset('js/aleatoire.js')}}"></script> 
@endpush