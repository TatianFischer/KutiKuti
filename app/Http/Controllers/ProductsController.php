<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Product;

class ProductsController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
    	$products = Product::all();
    	return view('product.index', compact('products'));
    }


    public function create(){
        return view('product.create');
    }

    public function store(Request $request, Product $product){

        $this->validate($request, [
            'modele' => 'required',
            'couleur' => 'required|in:"parme","gris"',
            'price' => 'required|integer',
            'photo' => 'required|image|dimensions:max_width=1000,max_height=1000',
        ]);

        $product->modele = $request->modele;
        $product->couleur = $request->couleur;
        $product->price = $request->price;
        if($request->hasFile('photo')){
            $file = Input::file('photo');

            $extension = $file->getClientOriginalExtension();
            $name = strtolower($product->modele).'_'.$product->couleur.'.'.$extension;
            $product->photo = $name;
            $file->move(public_path().'/img/products',$name);
        }

        $product->save();
        
        return $this->create()->with('success', 'Produit ajouté avec succès'); 
    }

    public function edit(Product $product){
        return view('product.edit', compact('product'));
    }

    public function update(Request $request, Product $product){
        $this->validate($request, [
            'modele' => 'required',
            'couleur' => 'required|in:"parme","gris"',
            'price' => 'required|integer',
            'photo' => 'image|dimensions:max_width=500,max_height=500',
        ]);

        $product->modele = $request->modele;
        $product->couleur = $request->couleur;
        $product->price = $request->price;

        $last_photo_name = $product->photo;

        if($request->hasFile('photo')){
            $file = Input::file('photo');
            unlink(public_path().'/img/products/'.$last_photo_name);

            $extension = $file->getClientOriginalExtension();
            $name = strtolower($product->modele).'_'.$product->couleur.".".$extension;
            $product->photo = $name;
            $file->move(public_path().'/img/products',$name);
        }

        $product->update();
        session()->flash('success', 'Video modifiée avec succès');
        return redirect()->route("products.index");
    }

    public function destroy(Product $product){
        $product_name = $product->photo;
        $product->delete();
        unlink(public_path().'/img/products/'.$product_name);
        return back()->with('success', 'Produit supprimé avec succès');
    }
}
