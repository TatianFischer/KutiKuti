<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Preorder extends Model
{
	// Relis les précommandes aux produits
    public function products(){
    	return $this->belongsToMany('App\Product');
    }

    public function preorder_products(){
    	return $this->hasMany('App\PreorderProduct');
    }
}
