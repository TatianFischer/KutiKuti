@extends('layouts.master')

@push('css')
	<link rel="stylesheet" href="{{URL::asset('css/admin.css')}}">
@endpush

@section('content')
<div class="container" id="videos">
	
	<h1>Gestion des vidéos</h1>
	<h2>Ajout d'une vidéo</h2>
	
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

	<form action="{{route('videos.store')}}" method="POST" enctype="multipart/form-data">
		 
		{{ csrf_field() }}

		<div class="col-md-6">
			<div class="form-group">
				<label for="title" class="control-label col-sm-4">Titre :</label>
				<input type="text" class="form-control" id="title" name="title" required>
			</div>

			<div class="form-group">
				<label for="step" class="control-label col-sm-4">Etape :</label>
				<input type="text" class="form-control" id="step" name="step" required>
			</div>

			<div class="form-group">
				<label for="tag" class="control-label col-sm-4">Tag :</label>
				<span class="help-block col-sm-6">Numéro de la vidéo</span>
				<input type="text" class="form-control" id="tag" name="tag" required>
			</div>
		</div>

		<div class="col-md-6">
			<div class="form-group">
				<label for="slug" class="control-label col-sm-4">Slug :</label>
				<span class="help-block col-sm-6">Nom à afficher dans l'url</span>
				<input type="text" class="form-control" id="slug" name="slug" required>
			</div>

			<div class="form-group">
				<label for="poster" class="control-label col-sm-4">Poster :</label>
				<input type="file" class="form-control" id="poster" name="poster" required>
			</div>
			
			<div class="form-group">
				<input type="submit" value="Validation" class="form-control">
			</div>
		</div>
	</form>

	{{--dd($video)--}}
</div>

@endsection