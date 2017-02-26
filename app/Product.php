<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $timestamps = false;

    // Relis les produits aux précommandes
    public function preorders(){
    	return $this->belongsToMany('App\Preorder');
    }

    public function preorder_products(){
    	return $this->hasMany('App\PreorderProduct');
    }
}
