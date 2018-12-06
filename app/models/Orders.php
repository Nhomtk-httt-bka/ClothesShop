<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class orders extends Model
{
    public $fillable = ['transaction_id','product_id','quantity','price','status'];
}
