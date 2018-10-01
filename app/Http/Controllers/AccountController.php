<?php

namespace App\Http\Controllers;

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

    public function editProfile(User $user)
    {
    	// de request valideren
    	$this->validate(request(), [
    		'name' => 'required',
            'email' => 'unique:users,email,'.\Auth::user()->id.'|required|email',
    		'schoolName' => 'required',
    		'city' => 'required'
    	]);

    	// values setten
    	$user->name = request('name');
    	$user->email = request('email');
    	$user->schoolName = request('schoolName');
    	$user->city = request('city');

    	// opslaan
    	if ($user->save()) {
        	return redirect('/account')->with('success', 'Profiel aangepast');
    	}

        return Redirect::back()->withErrors(['Er ging iets mis tijdens het bewerken']);
    }
}