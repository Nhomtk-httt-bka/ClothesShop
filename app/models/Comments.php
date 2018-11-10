<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class comments extends Model
{
    public function product(){
    	return $this->belongsTo('App\models\Products');
    }
    public function user(){
    	return $this->belongsTo('App\User');
    }
    
}
