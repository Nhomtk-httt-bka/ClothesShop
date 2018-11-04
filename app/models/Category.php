<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	public $fillable = ['category_name','category_description','category_url'];
	protected $table= "categories";
	public $timestamps = false;
    //
}
