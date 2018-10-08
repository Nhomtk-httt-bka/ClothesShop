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
    return '<h1>Hello Laravel</h1>';
});

Route::prefix('admin')->group(function(){
	Route::get('dashboard', 'AdminController@showDaskboard');
	Route::get('register', 'AdminController@showRegister');
	Route::get('forgotPass', 'AdminController@showForgot');
	Route::get('login','AdminController@showLogin');
	Route::post('login','AdminController@showDaskboard');
});


Route::get('home','UserController@showHome');
Route::get('login','UserController@showLogin');
Route::post('signin','UserController@checkAuth');
Route::get('register', 'UserController@showRegister');
Route::post('register','UserController@create')->name('register');
Route::get('logout', 'UserController@doLogout');

Route::middleware(['first', 'second'])->group(function () {
    Route::get('/buy', function () {
        // Uses first & second Middleware
    });

    Route::get('user/profile', function () {
        // Uses first & second Middleware
    });
});