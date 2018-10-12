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

Route::get('/', function() {
    return view('home');
});

Auth::routes();

// Login
Route::post('/inloggen/checklogin', 'Auth\UserLoginController@checkLogin');
Route::get('/inloggen', function() {
    return view('login');
})->name('inloggen');

// register
Route::post('/aanmelden/validate', 'Auth\UserLoginController@validateRegistration');
Route::get('/aanmelden', function() {
    return view('register');
});

// dashboard
Route::prefix('/dashboard')->group(function () {
	Route::get('', 'DashboardController@index');
	Route::get('/materiaal', 'DashboardController@allMaterial');
	Route::get('/materiaal/{slug}', 'DashboardController@getMaterial');
});

// account
Route::prefix('/account')->group(function () {
	Route::get('', 'AccountController@index');
	Route::get('/bewerken', 'AccountController@edit');
	Route::post('/bewerken', 'AccountController@editProfile');
});