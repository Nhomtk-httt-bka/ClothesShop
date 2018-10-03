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
	Route::get('daskboard', 'AdminController@showDaskboard');

	Route::get('login','AdminController@showLogin');
	Route::post('login','AdminController@showDaskboard');
});




Route::middleware(['first', 'second'])->group(function () {
    Route::get('/buy', function () {
        // Uses first & second Middleware
    });

    Route::get('user/profile', function () {
        // Uses first & second Middleware
    });
});