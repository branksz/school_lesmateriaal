<?php

namespace App\Http\Controllers;

use App\Admin;

class AdminSubmissions extends Controller
{
	// Redirect als de user niet is ingelogd of geen admin is
	public function __construct()
	{
        $this->middleware('admin');
	}

    // al het materiaal ophalen en terug sturen met view
    public function index()
    {
        $entries = \DB::table('subject_requests')->orderBy('id', 'desc')->limit(null)->get();
        return view('admin/submissions', ['entries' => $entries]);
    }

    // al het materiaal ophalen en terug sturen met view
    public function contact()
    {
        $entries = \DB::table('contact')->orderBy('id', 'desc')->limit(null)->get();
        return view('admin/submissions', ['entries' => $entries, 'isContact' => true]);
    }
}