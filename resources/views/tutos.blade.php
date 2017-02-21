@extends('layouts.master')

@section('content')
<div class="container">
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

	<div class="row">
		<div class="col-md-12 poster_row">
			<div class="col-md-4 poster">
				<img src="{{URL::asset('img/posters/poster_montage_electronique.png')}}" alt="">
			</div>
			<div class="col-md-4 poster">
				<img src="{{URL::asset('img/posters/poster_pliage.png')}}" alt="">
			</div>
			<div class="col-md-4 poster">
				<img src="{{URL::asset('img/posters/poster_remplissage.png')}}" alt="">
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
			<div class="col-md-4">
				<img src="" alt="">
			</div>
			<div class="col-md-4">
				<img src="" alt="">
			</div>
			<div class="col-md-4">
				<img src="" alt="">
			</div>
		</div>
	</div>


	
</div>


@endsection