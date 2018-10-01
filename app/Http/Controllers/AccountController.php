<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class AccountController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}

    // Profiel overzicht returen
    public function index()
    {
    	return view('account/index', ['user' => \Auth::user()]);
    }

    // Profiel edit pagina returnen
    public function edit()
    {
    	return view('account/edit', ['user' => \Auth::user()]);
    }
}