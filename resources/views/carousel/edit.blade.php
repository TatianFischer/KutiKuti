@extends('layouts.master')


@push('css')
	<link rel="stylesheet" href="{{URL::asset('css/admin.css')}}">
@endpush

@section('content')
<div class="container" id="carousel">
	<h1>Gestion des slides du carousel</h1>
	<h2>Modification d'un slide</h2>
	
	@if(count($errors))
	<div class="alert alert-danger">
		<ul>
			@foreach ($errors->all() as $error)
			<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>
	@endif

	@if(isset($success))
        <div class="alert alert-success"> {{$success}} </div>
    @endif

	<form action="{{route('carousel.update', ['carousel' => $carousel->id])}}" method="POST" enctype="multipart/form-data">
		 
		{{ csrf_field() }}

		{{ method_field('PUT') }}

		<div class="col-md-6">
			<div class="form-group">
				<label for="picture" class="control-label col-xs-4">Photo :</label>
				<span class="help-block col-xs-4">
					<a data-toggle="collapse" href="#photo-actuelle" aria-expended="false" aria-control="photo-actuelle">Image actuelle</a>
				</span>
				<div class="collapse" id="photo-actuelle" class="col-xs-4">
					<img src="{{URL::asset('img/carousel/'.$carousel->picture)}}">
				</div>
				<input type="file" class="form-control" id="photo" name="photo" value="{{$carousel->picture}}">
			</div>

			<div class="form-group">
				<label for="text" class="control-label col-sm-4">Texte :</label>
				<textarea class="form-control" name="text" rows="6">{{$carousel->text}}</textarea>
			</div>
		</div>

		<div class="col-md-6">
			<div class="form-group">
				<label for="alternative" class="control-label col-sm-4">Alternative :</label>
				<span class="help-block col-sm-6">Lue par les lecteurs d'écran</span>
				<input type="text" class="form-control" id="alternative" name="alternative" required value="{{$carousel->alternative}}">
			</div>


			<div class="form-group">
				<label for="position" class="control-label col-sm-4">Position horizontale :</label>
				<select class="form-control" id="position" name="position_horizontal">
					<option value="" @if($carousel->position_horizontal == '') {{'selected'}} @endif></option>
					<option value="left" @if($carousel->position_horizontal == 'left') {{'selected'}} @endif>Left</option>
					<option value="center" @if($carousel->position_horizontal == 'center') {{'selected'}} @endif>Center</option>	
					<option value="rigth" @if($carousel->position_horizontal == 'rigth') {{'selected'}} @endif>Right</option>	
				</select>
			</div>

			<div class="form-group">
				<label for="position" class="control-label col-sm-4">Position verticale :</label>
				<select class="form-control" id="position" name="position_vertical">
					<option value="" @if($carousel->position_vertical == '') {{'selected'}} @endif></option>
					<option value="top" @if($carousel->position_vertical == 'top') {{'selected'}} @endif>Top</option>
					<option value="middle" @if($carousel->position_vertical == 'middle') {{'selected'}} @endif>Middle</option>	
					<option value="bottom" @if($carousel->position_vertical == 'bottom') {{'selected'}} @endif>Bottom</option>
				</select>
			</div>
		</div>

		<div class="col-sm-6 col-sm-offset-3">
			<div class="form-group">
				<input type="submit" value="Validation" class="form-control">
			</div>
		</div>
	</form>
</div>
@endsection