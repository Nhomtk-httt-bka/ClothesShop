<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserPost;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function showHome(){
    	return view('users/home');
    }

    public function showLogin(){
    	return view('users/login');
    }
    public function showRegister(){
    	return view('users/register');
    }
    public function doLogout(){
    	Auth::logout();
    	return redirect('home');
    }

    protected function checkAuth(Request $request){
    	$credential=[
            'email'=>$request->email,
            'password'=>$request->password,
        ];
    	if(Auth::attempt($credential)){
    		return redirect('home');
    	}else{
    		return redirect('login')->withInput();
    	}
    	 
    }
    protected function create(StoreUserPost $request)
    {
    	// echo $request;

    	$validated = $request->validated();

        User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);
        return redirect('home');
    }
}
