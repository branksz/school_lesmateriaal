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
Route::get('/dashboard', function() {
	return view('dashboard');
})->middleware('auth');