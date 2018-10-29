<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Admin;

use Validator;
use Redirect;
use Auth;

class AdminLoginController extends Controller
{
    /**
     * Valideer de login attempt
     * Alleen admins laten inloggen niet normale users
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
        if (Auth::guard('admin')->attempt($user_data))
        {
            return redirect('admin/dashboard');
        }

        // default error
        return Redirect::back()->withErrors(['De gebruikersnaam en wachtwoord komen niet overeen'])->withInput();
    }
}