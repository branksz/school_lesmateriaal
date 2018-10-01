<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class DashboardController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}

    // Dashboard view returnen met lesmateriaal
    public function index()
    {
    	$entry = \DB::table('lessonmaterial')->orderBy('id', 'desc')->limit(3)->get();
    	return view('dashboard', ['entries' => $entry]);
    }
}