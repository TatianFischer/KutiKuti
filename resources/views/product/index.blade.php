@extends('layouts.master')

@push('css')
	<link rel="stylesheet" href="{{URL::asset('css/admin.css')}}">
@endpush

@section('content')
<div class="container" id="products">

	@include('layouts.admin_nav')

	<h1>Gestion des produits</h1>
	<h2>Listes des produits</h2>

	@if(session('success'))
        <div class="alert alert-success"> {{session('success')}} </div>
    @endif

    @if(isset($success))
        <div class="alert alert-success"> {{$success}} </div>
    @endif

	<p class="ajout"><a href="{{ route('products.create')}}">Ajouter un produit</a></p>

	<table>
		<thead>
			<th>Modele</th>
			<th>Couleur</th>
			<th>Prix</th>
			<th>Photo</th>
			<th colspan="2">Options</th>
		</thead>

		<tbody>
			
			@foreach($products as $product)

				<tr>

					<td>{{$product->modele}}</td>

					<td>{{$product->couleur}}</td>

					<td>{{$product->price}} €</td>

					<td><img src="{{URL::asset('img/products/'.$product->photo)}}" alt="{{$product->title}}"></td>

					<td><a href="{{route('products.edit', ['product' => $product->id])}}" class="btn btn-success">Modification</a></td>

					<td>
						<form action="{{route('products.destroy', ['product' => $product->id])}}" method="post">
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