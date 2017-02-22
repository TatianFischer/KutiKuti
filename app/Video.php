<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
	public $timestamps = false;
	protected $fillable = ['title', 'step', 'tag', 'slug', 'poster'];
}
