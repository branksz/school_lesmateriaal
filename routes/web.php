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
    return view('home');
});

Auth::routes();

// Login
Route::post('/inloggen/checklogin', 'LoginpageController@checklogin');
Route::get('/inloggen', function () {
    return view('login');
});

// register
Route::post('/aanmelden/validate', 'LoginpageController@checkregistration');
Route::get('/aanmelden', function () {
    return view('register');
});