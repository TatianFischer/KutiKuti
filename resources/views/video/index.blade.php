@extends('layouts.master')

@push('css')
	<link rel="stylesheet" href="{{URL::asset('css/admin.css')}}">
@endpush

@section('content')
<div class="container" id="videos">
	<h1>Gestion des vidéos</h1>
	<h2>Listes des vidéos</h2>

	<p class="ajout"><a href="{{ route('videos.create')}}">Ajouter une video</a></p>

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

					<td><img src="{{URL::asset('img/posters/'.$video->poster)}}" alt="{{$video->title}}"></td>

					<td><a href="{{route('videos.create')}}" class="btn btn-success">Modification</a></td>

					<td>
						<a href="{{route('videos.destroy', 'videos\$video->id')}}" class="btn btn-danger">Suppression</a>
					</td>
					
				</tr>

			@endforeach

		</tbody>

	</table>

@endsection