<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class transactions extends Model
{
    
    public $fillable = ['user_id','total_money','status'];
    
    public function orders(){
    	return $this->hasMany('App\models\Orders', 'transaction_id');
    }

    public function user(){
    	return $this->hasOne('App\User','id', 'user_id');
    }
}
