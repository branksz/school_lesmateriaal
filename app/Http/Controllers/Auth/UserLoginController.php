<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Validator;
use Redirect;
use Auth;

class UserLoginController extends Controller
{
    /**
     * De user proberen in de loggen en anders error terug sturen
     *
     * @param $request
     */
    public function checklogin(Request $request)
    {
        // validate request
        $this->validate($request, [
            'email'    => 'required|email',
            'password' => 'required|alphaNum|min:3'
        ]);

        $user_data = [
            'email'  => $request->get('email'),
            'password' => $request->get('password')
        ];

        // probeer de user in te loggen
        if (Auth::attempt($user_data))
        {
            return redirect('dashboard');
        }

        // default error
        return Redirect::back()->withErrors(['De gebruikersnaam en wachtwoord komen niet overeen']);

    }

    /**
     * De user registreren in de DB met de juiste rol
     *
     * @param $request
     */
    public function validateRegistration(Request $request)
    {
        $this->middleware('guest');

        $validate = Validator::make($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        if ($validate) {
        	$createUser = User::create([
        	    'name'     => $request->get('name'),
        	    'email'    => $request->get('email'),
        	    'role'     => 'school',
        	    'password' => Hash::make($request->get('password')),
        	]);

        	if ($createUser) {
        		return 'JA VRO';
        	}
        }

        return 'NEE VRO';
    }
}