<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    protected $table= "rates";
	public $timestamps = false;

	public function users(){
		return $this->hasMany('App\User');
	}
	public function products(){
		return $this->hasMany('App\models\Products');
	}
}
