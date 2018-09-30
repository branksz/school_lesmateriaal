<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\User;

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
        // validatie van de data
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'schoolName' => 'required|string|min:2',
            'city' => 'required|string|min:2',
            'password' => 'required|string|min:6|confirmed',
        ]);

        try {
            // user aanmaken
            User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'schoolName' => $data['schoolName'],
                'city' => $data['city'],
                'password' => Hash::make($data['password']),
            ]);
        } catch (\Exception $exception) {
            // error terugsturen
            logger()->error($exception);
            return Redirect::back()->withErrors(['Er ging iets fout, probeer het later opnieuw']);
        }

        // redirect naar login pagina
        return redirect('inloggen')->with('success', 'Registratie is gelukt, u kunt nu inloggen');
    }
}