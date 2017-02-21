@extends('layouts.master')

@section('content')
	<h1>Précommandes</h1>
		
	<table border="1" summary="Tableau résumant les commandes">
		<thead>

			<tr>
				<th>Numéro  de commande</th>
				<th>Nom</th>
				<th>Prénom</th>
				<th>Email</th>
				<th>Total</th>
				<th>Date de la commande</th>
				<th colspan="2">Action</th>
			</tr>

		</thead>

		<tbody>
			<!-- foreach($commands as $command) -->

			<tr>

				<!-- foreach($command as $key => $valeur) -->
					<!-- if($key == 'total') -->

					<td> $valeur  €</td>

					<!-- else -->

					<td> $valeur </td>

					<!-- endif -->

				<!-- endforeach -->

				<td><a href="">Détails</a></td>

				<td><a href="">Suppression</a></td>

			</tr>

			<!-- endforeach -->

		</tbody>

	</table>

	<h2>Détails de la commande</h2>

	<table border="1" summary="Informations sur l'acheteur">
		
		<thead>

			<tr>
				<th>Nom</th>
				<th>Prénom</th>
				<th>Email</th>
				<th>Adresse</th>
			</tr>

		</thead>

		<tbody>
			<!-- foreach($commands as $command) -->

			<tr>

				<!-- foreach($command as $key => $valeur) -->

					<td>  $valeur  </td>

				<!-- endforeach -->

			</tr>

			<!-- endforeach -->

		</tbody>

	</table>
		

	<table border="1" summary="Informations sur le contenu de la commande">
		
		<thead>
			
			<tr>
				<th>Modele</th>
				<th>Couleur</th>
				<th>Quantité</th>
			</tr>

		</thead>

		<tbody>
			<!-- foreach($commands as $command) -->

			<tr>

				<!-- foreach($command as $key => $valeur) -->
					<!-- if($key == 'total') -->

					<td> $valeur  €</td>

					<!-- else -->

					<td>  $valeur  </td>

					<!-- endif -->

				<!-- endforeach -->

			</tr>

			<!-- endforeach -->

		</tbody>

	</table>

@endsection