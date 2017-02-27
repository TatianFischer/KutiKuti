<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Relations\Concerns\InteractsWithPivotTable;
use App\Preorder;
use App\PreorderProduct;
use Carbon\Carbon;

class PreordersController extends Controller{
	function __construct()

	{

		$this->middleware('auth', ['except' => 'create', 'store']);
		// $this->middleware('ajax', ['only' => 'index']);

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

	private function productsArray($objects, $preorder){
		// Récupération des quantités
		$quantities = $preorder->preorder_products;

		foreach ($quantities as $key => $quantity) {
			$arrayQuantities[] = $quantity->quantity;
		}
		$i = 1;
		foreach ($objects as $key => $object) {
			$array = [
				'modele'	=> 	$object->modele,
				'couleur'	=> 	$object->couleur,
				'price'		=> 	$object->price,
				'quantity'	=>	$arrayQuantities[$i-1]
			];

			$arrayProducts[$i] = $array;
			$i++;
		}

		return $arrayProducts;
	}

  	public function create(){
    	return view('preorder.create');
	}


	public function destroy(Preorder $preorder){
		$preorder->products()->detach();
		$preorder->delete();

		return back()->with('success', 'Précommande supprimée avec succès');
	}
}
