<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('users/home');
});

Route::resource('admins', 'AdminController');
Route::prefix('admin')->group(function(){
	Route::middleware('admin_auth')->group(function(){
		Route::get('dashboard', 'AdminController@showDashboard');
	});
	Route::post('login','AdminController@checkAuth');
	Route::get('forgotPass', 'AdminController@showForgot');
	Route::get('logout',function(){
		Auth::logout();
    	return redirect('admins/');
	});
});

Route::middleware('admin_auth')->group(function(){
	Route::resource('categories','CategoryController');
	Route::resource('products','ProductController');
});

Route::resource('users','UserController');
Route::get('home','UserController@showHome');
Route::get('login','UserController@showLogin');
Route::post('signin','UserController@checkAuth');
Route::get('logout', 'UserController@doLogout');
Route::get('profile',function(){
	return view('users.profile');
});

Route::middleware(['first', 'second'])->group(function () {
    Route::get('/buy', function () {
        // Uses first & second Middleware
    });

    Route::get('user/profile', function () {
        // Uses first & second Middleware
    });
});