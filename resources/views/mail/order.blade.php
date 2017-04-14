<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Commande Kut&igrave; Kut&igrave;</title>
    
</head>
    
<body style="font-family: 'Chivo', sans-serif;">

    <h1>D&eacute;tails de votre commande</h1>

    <h2>Commande n&deg;{{$preorder->id}}</h2>
    <div class="row">
        <div class="col-md-6">
            <!-- lol -->
            <h4>Coordonn&eacute;es</h4>
            <p id="coordinates">
                {{$preorder->lastname}} {{$preorder->firstname}}<br>
                {{$preorder->address}}<br>
                {{$preorder->cp}} {{$preorder->city}}
            </p>
        </div>


        <div class="col-md-6">
            <h4>Produits</h4>
            <table id="list_products" style="border-collapse: collapse; text-align: center; width: 420px; border: 3px solid black;">
                <tr style="border-collapse: collapse; text-align: center; border: 3px solid black;" align="center">
                    <th colspan="3" style="border-collapse: collapse; text-align: center; min-width: 60px; padding: 5px; border: 3px solid black;" align="center">Produit</th>
                    <th rowspan="2" style="border-collapse: collapse; text-align: center; min-width: 60px; padding: 5px; border: 3px solid black;" align="center">Quantit&eacute;</th>
                    <th rowspan="2" style="border-collapse: collapse; text-align: center; min-width: 60px; padding: 5px; border: 3px solid black;" align="center">Prix Par <br> Article</th>
                </tr>
                <tr style="border-collapse: collapse; text-align: center; border: 3px solid black;" align="center">
                    <th style="border-collapse: collapse; text-align: center; min-width: 60px; padding: 5px; border: 3px solid black;" align="center">Mod&egrave;le</th>
                    <th style="border-collapse: collapse; text-align: center; min-width: 60px; padding: 5px; border: 3px solid black;" align="center">Couleur</th>
                    <th style="border-collapse: collapse; text-align: center; min-width: 60px; padding: 5px; border: 3px solid black;" align="center">Prix Unitaire</th>                                    
                </tr>
                @foreach($products as $product)
                    @if(session('panier'))
                        <?php $key = array_search($product->id, session('panier.id_produit')); ?>
                    @else
                        <?php $key = false; ?>
                    @endif

                    <?php $i = 0; $quantities = session('panier.quantity');?>
                    @if(session('panier') && $key !== false)
                        <tr style="border-collapse: collapse; text-align: center; border: 3px solid black;" align="center">
                            <td style="border-collapse: collapse; text-align: center; min-width: 60px; padding: 5px; border: 3px solid black;" align="center">{{$product->modele}}</td>
                            <td style="border-collapse: collapse; text-align: center; min-width: 60px; padding: 5px; border: 3px solid black;" align="center">{{$product->couleur}}</td>
                            <td style="border-collapse: collapse; text-align: center; min-width: 60px; padding: 5px; border: 3px solid black;" align="center">{{$product->price}} &euro;</td>
                            <td style="border-collapse: collapse; text-align: center; min-width: 60px; padding: 5px; border: 3px solid black;" align="center"> {{$quantities[$key]}}</td>
                            <td style="border-collapse: collapse; text-align: center; min-width: 60px; padding: 5px; border: 3px solid black;" align="center">{{$product->price*$quantities[$key]}} &euro;</td>
                        </tr>
                    @endif
                @endforeach
                <tr style="border-collapse: collapse; text-align: center; border: 3px solid black;" align="center">
                    <th colspan="3" style="border-collapse: collapse; text-align: center; min-width: 60px; padding: 5px; border: 3px solid black;" align="center">Total</th>
                    <th colspan="2" style="border-collapse: collapse; text-align: center; min-width: 60px; padding: 5px; border: 3px solid black;" align="center">{{$preorder->total}} &euro;</th>
                </tr>
            </table>
        </div>

        <p>
            Merci pour votre int&eacute;r&ecirc;t.
        </p>

        <p>
            Pauline et Anna
        </p>
    </div>
</body>
</html>
