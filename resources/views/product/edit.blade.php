@extends('layouts.master')

@push('css')
	<link rel="stylesheet" href="{{URL::asset('css/admin.css')}}">
@endpush

@section('content')
<div class="container" id="products">
	
	<h1>Gestion des produits</h1>
	<h2>Ajout d'un produit</h2>
	
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

	<form action="{{route('products.update', ['product' => $product->id])}}" enctype="multipart/form-data" method="post">
		 
		{{ csrf_field() }}
		{{ method_field('PUT') }}

		<div class="col-md-6">
			<div class="form-group">
				<label for="modele" class="control-label col-sm-4">Modèle :</label>
				<input type="text" class="form-control" id="modele" name="modele" required value="{{$product->modele}}">
			</div>

			<div class="form-group">
				<label for="couleur" class="control-label col-sm-4">Couleur :</label>
				<select class="form-control" id="couleur" name="couleur" required>
					<option value="gris" @if($product->couleur == 'gris') {{'selected'}} @endif>Gris</option>
					<option value="parme" @if($product->couleur == 'parme') {{'selected'}} @endif>Parme</option>
				</select>
			</div>
		</div>

		<div class="col-md-6">
			<div class="form-group">
				<label for="price" class="control-label col-sm-4">Prix :</label>
				<input type="text" class="form-control" id="price" name="price" required value="{{$product->price}}">
			</div>


			<div class="form-group">
				<label for="photo" class="control-label col-sm-2">Photo :</label>
				
				<div class="col-sm-3 col-xs-6">
				@if(isset($product->photo))
					<img src="{{URL::asset('img/products/'.$product->photo)}}" alt="{{$product->photo}}">
				@endif
				</div>
				<div class="col-sm-7 col-xs-9">
					<span class="help-block col-sm-6">1000px/1000px max</span>
					<input type="file" class="form-control" id="photo" name="photo" value="{{$product->photo}}">	
				</div>
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