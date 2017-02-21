@extends('layouts.master')

@push('css')
	<link rel="stylesheet" href="{{URL::asset('css/admin.css')}}">
@endpush

@section('content')
<div class="container">
	<h1>Gestion des vidéos</h1>
	<h2>Listes des vidéos</h2>

	<table>
		<thead>
			<th>Titre</th>
			<th>Etape</th>
			<th>Tag</th>
			<th>Slug</th>
			<th>Poster</th>
			<th colspan="2">Options</th>
		</thead>

		<tbody>
			
			@foreach($videos as $video)

				<tr>

					<td>{{$video->title}}</td>

					<td>{{$video->step}}</td>

					<td>{{$video->tag}}</td>

					<td>{{$video->slug}}</td>

					<td><img src="{{URL::asset('img/posters/'.$video->image)}}" alt="{{$video->title}}"></td>

					<td><a href="{{route('videos.create')}}" class="btn btn-success">Modification</a></td>

					<td>
						<a href="{{route('videos.destroy', 'videos\$video->id')}}" class="btn btn-danger">Suppression</a>
					</td>
					
				</tr>

			@endforeach

		</tbody>

	</table>


	<h2>Modification ou Ajout</h2>

	<form action="" method="post" enctype="multipart/form-data">
		 
		{{ csrf_field() }}

		<input type="text" name="id" hidden>
		<div class="col-md-6">
			<div class="form-group">
				<label for="title" class="control-label col-sm-4">Titre :</label>
				<input type="text" class="form-control" id="title" name="title">
			</div>

			<div class="form-group">
				<label for="step" class="control-label col-sm-4">Etape :</label>
				<input type="text" class="form-control" id="step" name="step">
			</div>

			<div class="form-group">
				<label for="tag" class="control-label col-sm-4">Tag :</label>
				<span class="help-block col-sm-6">Numéro de la vidéo</span>
				<input type="text" class="form-control" id="tag" name="tag">
			</div>
		</div>

		<div class="col-md-6">
			<div class="form-group">
				<label for="slug" class="control-label col-sm-4">Slug :</label>
				<span class="help-block col-sm-6">Nom à afficher dans l'url</span>
				<input type="text" class="form-control" id="slug" name="slug">
			</div>

			<div class="form-group">
				<label for="poster" class="control-label col-sm-4">Poster :</label>
				<input type="file" class="form-control" id="poster" name="poster">
			</div>
			
			<div class="form-group">
				<input type="submit" value="Validation" class="form-control">
			</div>
		</div>
	</form>
</div>
@endsection