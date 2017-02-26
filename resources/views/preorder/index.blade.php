@extends('layouts.master')

@push('css')
	<link rel="stylesheet" href="{{URL::asset('css/admin.css')}}">
@endpush

@section('content')
	<h1>Précommandes</h1>

	<h2 hidden>Détails de la commande</h2>

	<table border="1" summary="Informations sur l'acheteur" id="customer" hidden>	
		<thead>
			<tr>
				<th>Nom</th>
				<th>Prenom</th>
				<th>Email</th>
				<th>Adresse</th>
				<th>Code Postal</th>
				<th>Ville</th>
			</tr>
		</thead>

		<tbody>
			<!-- JS -->
		</tbody>
	</table>

	<table border="1" summary="Informations sur le contenu de la commande" id="products_details" hidden>
		<thead>
			
			<tr>
				<th>Modele</th>
				<th>Couleur</th>
				<th>Quantité</th>
				<th>Prix unitaire</th>
				<!-- <th>Total sur le produit</th> -->
			</tr>
		</thead>

		<tbody>
			<!-- JS -->
		</tbody>

	</table>
		
	<table border="1" summary="Tableau résumant les commandes">
		<thead>
			<tr>
				<th>Numéro de commande</th>
				<th>Nom</th>
				<th>Prénom</th>
				<th>Total</th>
				<th>Date de la commande</th>
				<th colspan="2">Action</th>
			</tr>

		</thead>

		<tbody>
			@foreach($preorders as $preorder)
			<tr>

				<td>{{$preorder->id}}</td>

				<td>{{$preorder->lastname}}</td>

				<td>{{$preorder->firstname}}</td>

				<td>{{$preorder->total}} €</th>

				<td>{{$preorder->created_at->format('d/m/Y')}}</td>	

				<td>
					<form action="{{route('preorders.show', ['preorder' => $preorder->id])}}" method="get" id="details">
						<button type="submit" class="btn btn-primary">Détails</button>
					</form>
				</td>

				<td>
					<form action="{{--route('', ['preorder' => $preorder->id])--}}" method="post">
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

@push('js')
	<script src="{{URL::asset('js/preorder.js')}}"></script>
@endpush