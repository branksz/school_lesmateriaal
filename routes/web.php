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

// uitloggen
Route::get('/uitloggen', 'Auth\UserLoginController@logout');

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

	Route::get('/onderwerp', 'DashboardController@requestSubject');
	Route::post('/onderwerp', 'DashboardController@requestSubjectPost');
});

// account
Route::prefix('/account')->group(function () {
	Route::get('', 'AccountController@index');
	Route::get('/bewerken', 'AccountController@edit');
	Route::post('/bewerken', 'AccountController@editProfile');
});

// admin
Route::prefix('/admin')->group(function () {
	Route::get('/', function() {
		return view('admin.index');
	})->name('adminLogin');

	Route::prefix('/lesmateriaal')->group(function () {
		Route::get('', 'AdminLessonmaterial@allMaterial');
		Route::post('/status', 'AdminLessonmaterial@toggleStatus');
		Route::post('/zoeken', 'AdminLessonmaterial@searchMaterial');
	});

	// Login validatie
	Route::post('/', 'Auth\AdminLoginController@checkLogin');

	// dashboard
	Route::prefix('/dashboard')->group(function () {
		Route::get('', 'AdminAccountController@index');
	});
});