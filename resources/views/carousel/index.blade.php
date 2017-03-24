@extends('layouts.master')


@push('css')
	<link rel="stylesheet" href="{{URL::asset('css/admin.css')}}">
@endpush

@section('content')
<div class="container" id="products">

	<h1>Gestion des slides du carousel</h1>
	<h2>Listes des slides</h2>

	@if(session('success'))
        <div class="alert alert-success"> {{session('success')}} </div>
    @endif

    @if(isset($success))
        <div class="alert alert-success"> {{$success}} </div>
    @endif

	<p class="ajout"><a href="{{ route('carousel.create')}}">Ajouter un slide</a></p>

	<table>
		<thead>
			<th>Photo</th>
			<th class="texte">Alternative pour lecteurs d'écran</th>
			<th class="texte">Texte</th>
			<th colspan="2">Position</th>
			<th colspan="2">Options</th>
		</thead>

		<tbody>
			
			@foreach($carousels as $carousel)

				<tr>

					<td><img src="{{URL::asset('img/carousel/'.$carousel->picture)}}" alt="{{$carousel->title}}"></td>

					<td>{{$carousel->alternative}}</td>

					<td>{{$carousel->text}}</td>

					<td>{{$carousel->position_vertical}}</td>

					<td>{{$carousel->position_horizontal}}</td>

					<td><a href="{{route('carousel.edit', ['carousel' => $carousel->id])}}" class="btn btn-success">Modification</a></td>

					<td>
						<form action="{{route('carousel.destroy', ['carousel' => $carousel->id])}}" method="post">
						{{ csrf_field() }}
						{{ method_field('DELETE') }}
						<button type="submit" class="btn btn-danger">Suppression</button>
						</form>
					</td>
					
				</tr>

			@endforeach

		</tbody>

	</table>

@endsection