@extends('layouts.master')

@section('content')
<!--<div class="container" id="tutos">
	<div class="row">
		<div class="col-md-12 poster_row">
			<div class="col-md-4 poster">
				<img src="{{URL::asset('img/posters/poster_assemblage.png')}}" alt="">
			</div>
			<div class="col-md-4 poster">
				<img src="{{URL::asset('img/posters/poster_cloutage.png')}}" alt="">
			</div>
			<div class="col-md-4 poster">
				<img src="{{URL::asset('img/posters/poster_couture.png')}}" alt="">
			</div>
		</div>
	</div>
-->

<div class="container" id="tutos">
<?php $i=0 ?>
@foreach($videos as $video)


	@if ($i%3 == 0)
	<div class="row">
		<div class="col-md-12 poster_row">
	@endif
			<div class="col-md-4 poster">
					dd($video);
					<a href="{{URL::asset('img/poster/'.$video->id)}}" rel="stylesheet">
					
			</div>
	

	@if($i%3 == 2)
		</div>
	</div>
	@endif

<?php $i++ ?>

@endforeach



	
</div>

@endsection