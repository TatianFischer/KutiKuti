<!DOCTYPE html>
<html lang="fr">
<head>
	<title>Commande Kutì Kutì</title>
</head>
	<style type="text/css">
		table, td, tr, th{
			border: 3px solid black;
			border-collapse: collapse;
			text-align: center;
		}

		td, th{
			padding: 5px;
		}

		th.texte{
			width: 20rem;
		}

		table{
			margin: 5px auto;
		}
	</style>
<body>

	<h1>Détails de la commande</h1>

	<h2>Commande n°{{$preorder->id}}</h2>
	<div class="row">
        <div class="col-md-6">
            <!-- lol -->
            <h4>Coordonnées</h4>
            <p id="coordinates">
                {{$preorder->lastname}} {{$preorder->firstname}}<br>
                {{$preorder->address}}<br>
                {{$preorder->cp}} {{$preorder->city}}
            </p>
        </div>


        <div class="col-md-6">
            <h4>Produits</h4>
            <table id="list_products">
                <tr>
                    <th colspan="3">Produit</th>
                    <th rowspan="2">Quantité</th>
                    <th rowspan="2">Prix Par <br> Article</th>
                </tr>
                <tr>
                    <th>Modèle</th>
                    <th>Couleur</th>
                    <th>Prix Unitaire</th>                                    
                </tr>
                @foreach($products as $product)
                	@if(session('panier'))
                        <?php $key = array_search($product->id, session('panier.id_produit')); ?>
                    @else
                        <?php $key = false; ?>
                    @endif

                    <?php $i = 0; $quantities = session('panier.quantity');?>
                    @if(session('panier') && $key !== false)
		                <tr>
		                    <td>{{$product->modele}}</td>
		                    <td>{{$product->couleur}}</td>
		                    <td>{{$product->price}} €</td>
		                    <td> {{$quantities[$key]}}</td>
		                    <td>{{$product->price*$quantities[$key]}} €</td>
		                </tr>
		            @endif
                @endforeach
                <tr>
                    <th colspan="3">Total</th>
                    <th colspan="2">{{$preorder->total}} €</th>
                </tr>
            </table>
        </div>
    </div>
</body>
</html>