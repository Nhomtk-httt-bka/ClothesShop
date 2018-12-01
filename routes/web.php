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
    return redirect('home');
});

 // Admin
Route::resource('admins', 'AdminController');
Route::prefix('admin')->group(function(){
	Route::middleware('admin_auth')->group(function(){
		Route::get('dashboard', 'AdminController@showDashboard');
	});
	Route::post('login','AdminController@checkAuth');
	
	Route::get('logout',function(){
		auth('admin')->logout();
    	return redirect('admins/');
	});
});

Route::middleware('admin_auth')->group(function(){
	Route::resource('categories','CategoryController');
	Route::resource('products','ProductController');
	Route::resource('employees','EmployeeController');
});


Route::get('employees/block/{id}', 'EmployeeController@blockEmployee');
Route::get('employees/unblock/{id}', 'EmployeeController@unblockEmployee');
Route::get('users/block/{id}', 'UserController@blockUser');
Route::get('users/unblock/{id}', 'UserController@unblockUser');
Route::get('users/details/{id}','UserController@getDetail');


// Home site user
Route::resource('home','HomeController');
Route::get('product/{id}','HomeController@showProduct');
Route::get('category/{id}','HomeController@showCategory');
Route::get('about','HomeController@about');


// User
Route::resource('users','UserController');
Route::get('login','UserController@showLogin');
Route::post('signin','UserController@checkAuth');
Route::get('logout', 'UserController@doLogout');
Route::middleware('user_auth')->group(function(){
	Route::get('changePassword', 'UserController@changePassword');
	Route::resource('comments','CommentController');
});


// Cart
Route::resource('carts','CartController');
Route::post('rmProduct','CartController@rmProduct');

// Test
Route::get('test', function() {
    return view('users.cart');
});
Route::middleware(['first', 'second'])->group(function () {
    Route::get('/buy', function () {
        // Uses first & second Middleware
    });

    Route::get('user/profile', function () {
        // Uses first & second Middleware
    });
});