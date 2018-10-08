<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
	public function showDaskboard(){
		return view('admins/dashboard');
	}

	public function showLogin(){
    	return view('admins/login');
    }

    public function showRegister(){
    	return view('admins/register');
    }

    public function showForgot(){
    	return view('admins/forgot-password');
    }

    public function getStart(){
    	return "<h1>Admin controler</h1>";
    }
}
