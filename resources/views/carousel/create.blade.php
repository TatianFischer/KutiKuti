@extends('layouts.master')


@push('css')
	<link rel="stylesheet" href="{{URL::asset('css/admin.css')}}">
@endpush

@section('content')
<div class="container" id="carousel">
	<h1>Gestion des slides du carousel</h1>
	<h2>Ajout d'un slide</h2>
	
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

	<form action="{{route('carousel.store')}}" method="POST" enctype="multipart/form-data">
		 
		{{ csrf_field() }}

		<div class="col-md-6">
			<div class="form-group">
				<label for="picture" class="control-label col-sm-4">Photo :</label>
				<input type="file" class="form-control" id="picture" name="picture" required>
			</div>

			<div class="form-group">
				<label for="text" class="control-label col-sm-4">Texte :</label>
				<textarea class="form-control" name="text" rows="6"></textarea>
			</div>
		</div>

		<div class="col-md-6">
			<div class="form-group">
				<label for="alternative" class="control-label col-sm-4">Alternative :</label>
				<span class="help-block col-sm-6">Lue par les lecteurs d'écran</span>
				<input type="text" class="form-control" id="alternative" name="alternative" required>
			</div>


			<div class="form-group">
				<label for="position" class="control-label col-sm-4">Position horizontale :</label>
				<select class="form-control" id="position" name="position_horizontal">
					<option value=""></option>
					<option value="left">Left</option>
					<option value="center">Center</option>	
					<option value="rigth">Right</option>	
				</select>
			</div>

			<div class="form-group">
				<label for="position" class="control-label col-sm-4">Position verticale :</label>
				<select class="form-control" id="position" name="position_vertical">
					<option value=""></option>
					<option value="top">Top</option>
					<option value="middle">Middle</option>	
					<option value="bottom">Bottom</option>	
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