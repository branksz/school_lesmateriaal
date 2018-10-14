<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use Auth;

class AdminAccountController extends Controller
{
	// Redirect als de user niet is ingelogd of geen admin is
	public function __construct()
	{
        $this->middleware('admin');
	}

    // Dashbaord laden voor admin
    public function index()
    {
    	return view('admin.dashboard.index');
    }
}