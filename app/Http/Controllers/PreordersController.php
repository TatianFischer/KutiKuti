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

	public function index(){
		$preorders = Preorder::latest()->get();

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
		$step = 0;
    	return view('preorder.create', compact('products', 'step'));
	}

	public function createCustomer(Request $request){
		//dd($request);
		$this->validate($request,[
			'lastname' => 'required|min:2|max:191',
			'firstname' => 'required|min:2|max:191',
			'email' => 'email',
			'address' => 'required|min:10',
			'city' => 'required|min:2',
			'cp' => 'numeric|digits:5',
		]);

		$user = [
			'lastname' 	=> 	$request->lastname,
			'firstname' => 	$request->firstname,
			'email'		=>	$request->email,
			'address' 	=>	$request->address,
			'city'		=> 	ucfirst($request->city),
			'cp'		=>	$request->cp
		];

		$request->session()->put(['user' => $user]);
		$products = Product::all();
		$step = 1;
    	return view('preorder.create', compact('products', 'step'));
	}

	public function ajoutPanier(Request $request){
		if(!isset($panier)){
			$panier = $this->creationPanier();
		}
		//dd($request);
		foreach ($request->product as $produit) {
			$panier['id_produit'][] = $produit;
			$panier['quantity'][] = 1;
		}

		$request->session()->put(['panier' => $panier]);

		$products = Product::all();
		$step = 2;
    	return view('preorder.create', compact('products', 'step'));
	}

	private function creationPanier(){
		return $panier = [
			'id_produit' => [],
			'quantity' => []
		];
	}

	public function decrementation($quantity, $key){
		if(is_numeric($quantity) && is_numeric($key) && session('panier.id_produit.'.$key) !==null){
			if($quantity > 1){
				session(['panier.quantity.'.$key => $quantity-1]);

			} else if ($quantity == 1) {
				$this->retirerProduct($key);

			} else {
				return back()->with('error', 'Erreur veuillez réessayer ultérieurement');
			}

			$products = Product::all();
			$step = 2;
	    	return view('preorder.create', compact('products', 'step'));

		} else {
			return back()->with('error', 'Erreur veuillez réessayer ultérieurement');
		}
	}

	private function retirerProduct($key){
		$products = session('panier.id_produit');
		array_forget($products, $key);
		session(['panier.id_produit' => $products]);
		
		$quantities = session('panier.quantity');
		array_forget($quantities, $key);
		session(['panier.quantity' => $quantities]);

		//dd(session('panier'));
	}

	public function incrementation($quantity, $id){
		if(is_numeric($quantity) && is_numeric($id)){
			session(['panier.quantity.'.$id => $quantity+1]);
			
			$products = Product::all();
			$step = 2;
	    	return view('preorder.create', compact('products', 'step'));
	    } else {
	    	return back()->with('error', 'Erreur veuillez réessayer ultérieurement');
	    }
	}

	public function store(Request $request, Preorder $preorder){
		// dd($request);
		// Vérification due les quantité et les id_produits sont des chiffres
		$quantities = $this->verificationIsNum("quantities");

		$products = $this->verificationIsNum("products");

		$total = $this->calculMontantCommande($quantities, $products);

		// Ajout à la base de données

		//$preorder = $this->validateUser($preorder);
		$preorder->lastname = session("user.lastname");
		$preorder->firstname = session("user.firstname");
		$preorder->email = session("user.email");
		$preorder->address = session("user.address");
		$preorder->cp = session("user.cp");
		$preorder->city = session("user.city");
		$preorder->total = $total;

		//dd($preorder);
		$preorder->save();


		foreach ($products as $key => $product){
			//dd($quantities[$product]);
			$preorder->products()->attach($product, ['quantity' => $quantities[$key]]);
		}
	
		return $this->create()->with('success', 'Commande envoyée avec succès');
	}

/*	private function validateUser(Preorder $preorder){
		$user = session('user');


	//'lastname' => 'required|min:2', 'firstname' => 'required|min:2', 'email' => 'email', 'address' => 'required|min:2', 'city' => 'required|min:2', 'cp' => 'numeric|digits:5'

		if(isset($user['lastname']) && mb_strlen($user['lastname'], 'UTF-8') > 1 && mb_strlen($user['lastname'], 'UTF-8') < 191 && is_string($user['lastname'])){
			$preorder->lastname = $user['lastname'];

		} else {
			$errors['lastname'] = "Votre nom doit faire entre 2 et 191 cractères";
		}


		if(isset($user['firstname']) && mb_strlen($user['firstname'], 'UTF-8') > 1 && mb_strlen($user['firstname'] , 'UTF-8') < 191 && is_string($user['firstname'])){
			$preorder->firstname = $user['firstname'];

		} else {
			$errors['firstname'] = "Votre prénom doit faire entre 2 et 191 caractères";
		}

		if(isset($user['address']) && mb_strlen($user['address']) > 10 && is_string($user['address']))

		dd($preorder);
	}*/

	private function verificationIsNum($test){

		if($test == "products"){

			$array = session('panier.id_produit');

		} else if ($test == "quantities"){

			$array = session('panier.quantity');

		} else {

			return back()->with('error', 'Erreur veuillez réessayer plus tard');

		}

		foreach($array as $value)
		{
			if(is_numeric($value)){

				$arrayOk[] = $value;

			} else {

				return back()->with('error', 'Erreur veuillez réessayer plus tard');

			}		

		}

		return $arrayOk;
	}

	private function calculMontantCommande($quantities, $products){

		// Appel de la base de donnée pour le prix
		$prices = Product::pluck('price');
		
		$montant="";

		foreach($products as $key => $id_produit){
			// id_produit commence à 1 et les tableaux à 0
			$montant += $prices[$id_produit-1]*$quantities[$key];
		}


		return $montant;
	}


	public function destroy(Preorder $preorder){
		$preorder->products()->detach();
		$preorder->delete();

		return back()->with('success', 'Précommande supprimée avec succès');
	}
}
