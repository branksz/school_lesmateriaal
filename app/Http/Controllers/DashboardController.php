<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RequestSubject;
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
    	$entry = \DB::table('lessonmaterial')->where('status', 1)->orderBy('id', 'desc')->limit(3)->get();
    	return view('dashboard/index', ['entries' => $entry, 'status']);
    }

    // al het materiaal ophalen en terug sturen met view
    public function allMaterial()
    {
        $entries = \DB::table('lessonmaterial')->where('status', 1)->orderBy('id', 'desc')->limit(null)->get();
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

    // pagina waar je een onderwerp kan insturen
    public function requestSubject()
    {
        return view('dashboard/onderwerp');
    }

    // pagina waar je een onderwerp kan insturen
    public function requestSubjectPost(Request $request)
    {
        // backend check of subject is ingevuld
        $request->validate(['subject' => 'required']);

        // nieuwe request aanmaken
        $subject = new RequestSubject();
        $subject->subject = $request->get('subject');

        // opslaan
        if ($subject->save()) {
            return redirect('/dashboard/onderwerp')->with('success', 'Onderwerp ingestuurd!');
        } else {
            return Redirect::back()->withErrors(['Er ging iets mis tijdens het insturen, probeer het later opnieuw']);
        }
    }
}