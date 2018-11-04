<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\User;
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

    public function editProfile(Request $request)
    {
        // current user erbij pakken
        $user = Auth::user();

    	// de request valideren
    	$request->validate([
    		'name' => 'required',
            'email' => 'unique:users,email,'.\Auth::user()->id.'|required|email',
            'schoolName' => 'required',
            'city' => 'required'
    	]);

    	// values setten
    	$user->name = $request->get('name');
    	$user->email = $request->get('email');
    	$user->schoolName = $request->get('schoolName');
    	$user->city = $request->get('city');

    	// opslaan
    	if ($user->save()) {
        	return redirect('/account')->with('success', 'Profiel aangepast');
    	}

        return Redirect::back()->withErrors(['Er ging iets mis tijdens het bewerken']);
    }
}