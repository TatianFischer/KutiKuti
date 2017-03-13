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

	<form action="{{route('products.store')}}" method="POST" enctype="multipart/form-data">
		 
		{{ csrf_field() }}

		<div class="col-md-6">
			<div class="form-group">
				<label for="modele" class="control-label col-sm-4">Modèle :</label>
				<input type="text" class="form-control" id="modele" name="modele" required>
			</div>

			<div class="form-group">
				<label for="couleur" class="control-label col-sm-4">Couleur :</label>
				<input type="text" class="form-control" id="couleur" name="couleur" required>
				<div id="choix_couleur" hidden>
					<ul>
						<!-- Liste des couleurs -->
					</ul>
				</div>
			</div>
		</div>

		<div class="col-md-6">
			<div class="form-group">
				<label for="price" class="control-label col-sm-4">Prix :</label>
				<input type="text" class="form-control" id="price" name="price" required>
			</div>


			<div class="form-group">
				<label for="photo" class="control-label col-sm-4">Photo :</label>
				<span class="help-block col-sm-6">1000px/1000px max</span>
				<input type="file" class="form-control" id="photo" name="photo" required>
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

@push('js')
	<script type="text/javascript">
		$('input[name="couleur"]').on('keyup', function(){
			$('#choix_couleur ul').empty();
			$.each(<?= $distinct_color ?>, function(index, color){
				// On cherche si la chaine entrée correspond aux couleurs
					// search renvoie le position dans la chaine
					couleurTyped = $('input[name="couleur"]').val();
					couleurTypedLower = couleurTyped.toLowerCase();
				if (!color.search(couleurTypedLower)) {
					console.log(color);
					$('<li>').append($('<a>').text(color)
						.on("click", function(){
							$('input[name="couleur"]').val($(this).text());
							$('input[name="couleur"]').next().hide(); 
						}))
							.appendTo('#choix_couleur ul');
				}	
			})
		})

		$('#choix_couleur').show();
	</script>
@endpush