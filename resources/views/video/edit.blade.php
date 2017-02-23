@extends('layouts.master')

@push('css')
	<link rel="stylesheet" href="{{URL::asset('css/admin.css')}}">
@endpush

@section('content')
<div class="container" id="videos">
	<h1>Gestion des vidéos</h1>
	<h2>Modification d'une vidéo</h2>
	
	@if(count($errors))
	<div class="alert alert-danger">
		<ul>
			@foreach ($errors->all() as $error)
			<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>
	@endif

	<form action="{{route('videos.update', ['video' => $video->id])}}" enctype="multipart/form-data" method="post">
		 
		{{ csrf_field() }}
		{{ method_field('PUT') }}

		<div class="col-md-6">
			<div class="form-group">
				<label for="title" class="control-label col-sm-4">Titre :</label>
				<input type="text" class="form-control" id="title" name="title" required value={{$video->title}}>
			</div>

			<div class="form-group">
				<label for="step" class="control-label col-sm-4">Etape :</label>
				<input type="text" class="form-control" id="step" name="step" required value="{{$video->step}}">
			</div>

			<div class="form-group">
				<label for="tag" class="control-label col-sm-4">Tag :</label>
				<span class="help-block col-sm-6">Numéro de la vidéo</span>
				<input type="text" class="form-control" id="tag" name="tag" required value="{{$video->tag}}">
			</div>
		</div>

		<div class="col-md-6">
			<div class="form-group">
				<label for="slug" class="control-label col-sm-4">Slug :</label>
				<span class="help-block col-sm-6">Nom à afficher dans l'url</span>
				<input type="text" class="form-control" id="slug" name="slug" required value="{{$video->slug}}">
			</div>

			<div class="form-group">
				<label for="poster" class="control-label col-sm-2">Poster :</label>
				
				<div class="col-sm-3 col-xs-6">
				@if(isset($video->poster))
					<img src="{{URL::asset('img/posters/'.$video->poster)}}" alt="{{$video->title}}">
				@endif
				</div>
				<div class="col-sm-7 col-xs-9">
					<input type="file" class="form-control" id="poster" name="poster" value="{{$video->poster}}">	
				</div>
			</div>
			
			<div class="form-group">
				<input type="submit" value="Validation" class="form-control">
			</div>
		</div>
	</form>

	{{--dd($video)--}}
</div>

@endsection