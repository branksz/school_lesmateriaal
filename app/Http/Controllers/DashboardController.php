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
    	return view('dashboard/index', ['entries' => $entry]);
    }

    public function allMaterial()
    {
        $entries = \DB::table('lessonmaterial')->orderBy('id', 'desc')->limit(null)->get();
        return view('dashboard/allmaterial', ['entries' => $entries]);
    }

    // lesmateriaal view returnen met lesmateriaal
    public function getMaterial($slug = null)
    {
        $entry = \DB::table('lessonmaterial')->where('slug', $slug)->get();

        // indien niet gevonden
        if (sizeof($entry) > 0) {
            return view('dashboard/_entry', ['entry' => $entry[0]]);
        }

        return view('404');
    }
}