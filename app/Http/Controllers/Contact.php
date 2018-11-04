<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Contact as form;

class Contact extends Controller
{
    public function index()
    {
    	return view('contact');
    }

    // formulier versturen & verwerken
    public function sendmail(Request $request)
    {
        // valideer data
        $request->validate([
        	'naam' => 'required',
        	'email' => 'required|email',
        	'bericht' => 'required',
        ]);

        // contact model vullen en proberen te opslaan
        $contact = new form();

        $contact->name = $request->get('naam');
        $contact->email = $request->get('email');
        $contact->message = $request->get('bericht');

        if ($contact->save()) {
            return redirect('/contact')->with('success', 'Formulier verstuurd');
        }

        return Redirect::back()->withErrors(['Er ging iets mis tijdens het verwerken']);
    }
}