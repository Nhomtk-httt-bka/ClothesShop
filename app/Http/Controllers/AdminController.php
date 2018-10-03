<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
	public function showDaskboard(){
		return view('admins/daskboard');
	}
    public function getStart(){
    	return "<h1>Admin controler</h1>";
    }
    public function showLogin(){
    	return view('admins/login');
    }
}
