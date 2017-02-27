@extends('layouts.master')

@section('content')

<div class="container" id="tutos">

<?php $i=0 ?>
@foreach($videos as $video)


	@if ($i%3 == 0)
	<div class="row">
	
		<div class="col-md-12 poster_row">
	@endif

			<div class="col-sm-4 poster">
					<figure>
						<a href="{{route('tutos.show',['videos' => $video->id])}}">
							<img src="{{URL::asset('img/posters/'.$video->poster)}}" alt="">
							<figcaption>Etape #{{$video->step}} <br> {{$video->title}}</figcaption>
						</a>
					</figure>
					
			</div>
	

	@if($i%3 == 2)

		<!-- fin de la div poster_row -->
		</div>

	<!-- fin de la div class row -->

	</div>
	@endif

<?php $i++ ?>

@endforeach


</div>

@endsection