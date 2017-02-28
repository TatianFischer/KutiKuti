<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Relations\Concerns\InteractsWithPivotTable;
use App\Preorder;
use App\Product;
use App\PreorderProduct;
use Carbon\Carbon;

class PreordersController extends Controller{
	function __construct()

	{

		$this->middleware('ajax', ['only' => 'show']);

	}

	public function index(){
		$preorders = Preorder::all();

		return view('preorder.index', compact('preorders'));
	}

	public function show($id){
		// On récupère la précommande
		$o_preorder = Preorder::find($id);
		// Transformation en array
		$preorder[] = $this->preorderArray($o_preorder);

		// On récupère le détail
		$o_products = $o_preorder->products;

		// Transformation en array
		$products = $this->productsArray($o_products, $o_preorder);

		// Fusion des deux tableaux pour renvoyer sous format jSON
		$preorder_product = array_merge($preorder, $products);
		return json_encode($preorder_product);
	}

	private function preorderArray($object){
		$array = [
			'lastname' 	=> 	$object->lastname,
			'firstname' => 	$object->firstname,
			'email'		=>	$object->email,
			'address' 	=>	$object->address,
			'city'		=> 	$object->city,
			'cp'		=>	$object->cp,
			'total'		=>	$object->total
		];

		return $array;
	}

	private function productsArray($products, $preorder){
		// Récupération des quantités
		$quantities = $preorder->preorder_products;

		foreach ($quantities as $key => $quantity) {
			$arrayQuantities[] = $quantity->quantity;
		}
		$i = 1;
		foreach ($products as $key => $product) {
			$array = [
				'modele'	=> 	$product->modele,
				'couleur'	=> 	$product->couleur,
				'price'		=> 	$product->price,
				'quantity'	=>	$arrayQuantities[$i-1]
			];

			$arrayProducts[$i] = $array;
			$i++;
		}

		return $arrayProducts;
	}

  	public function create(){
		$products = Product::all();
    	return view('preorder.create', compact('products'));
	}

	public function store(Request $request, Preorder $preorder){

		$quantities = $this->verificationQuantity($request);


		$total = $this->calculMontantCommande($request, $quantities);

		$this->validate($request,[
			'lastname' => 'required|min:2',
			'firstname' => 'required|min:2',
			'email' => 'email',
			'address' => 'required|min:2',
			'city' => 'required|min:2',
			'cp' => 'numeric|digits:5',
			'quantity.*' => 'numeric|nullable'
		]);

		$preorder->lastname 	= $request->lastname;
		$preorder->firstname 	= $request->firstname;
		$preorder->email 		= $request->email;
		$preorder->address 		= $request->address;
		$preorder->city 		= $request->city;
		$preorder->cp 			= $request->cp;
		$preorder->total 		= $total;

		//dd($preorder);
		$preorder->save();

		// Ajout à la table pivot
		$products = $request->product;
		foreach ($products as $key => $product){
			// le table quantities commence à la valeur 0
			$product_id = intval($product - 1);
			//dd($quantities[$product]);
			$preorder->products()->attach($product, ['quantity' => $quantities[$product_id]]);
		}
	
		return back()->with('success', 'Commande envoyée avec succès');
	}

	private function verificationQuantity($request){
		$quantity = $request->quantity;

		foreach($quantity as $value)
		{
			$value = trim($value);

			$quantities[] = $value;

		}

		return $quantities;
	}

	private function calculMontantCommande($request, $quantities){

		// Appel de la base de donnée pour le prix
		$prices = Product::pluck('price');
		
		$montant="";

		for($i=0; $i<count($prices); $i++) {
			$montant += $prices[$i]*$quantities[$i];
		}
		return $montant;
	}


	public function destroy(Preorder $preorder){
		$preorder->products()->detach();
		$preorder->delete();

		return back()->with('success', 'Précommande supprimée avec succès');
	}
}
