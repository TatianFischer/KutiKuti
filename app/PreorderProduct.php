<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PreorderProduct extends Model
{
	protected $table = 'preorder_product';

	public function preorder(){
		return $this->belongsTo('App\Preorder');
	}

	public function product(){
		return $this->belongsTo('App\Product');
	}
}