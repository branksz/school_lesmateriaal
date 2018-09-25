<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Redirect;
use Auth;

class LoginpageController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('login');
    }

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
    public function checkregistration(Request $request)
    {
        
    }
}