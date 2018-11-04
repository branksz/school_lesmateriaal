<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lessonmaterial;
use App\Admin;
use Auth;

class AdminLessonmaterial extends Controller
{
	// Redirect als de user niet is ingelogd of geen admin is
	public function __construct()
	{
        $this->middleware('admin');
	}

    // al het materiaal ophalen en terug sturen met view
    public function allMaterial()
    {
        $entries = \DB::table('lessonmaterial')->orderBy('id', 'desc')->limit(null)->get();
        return view('admin/allmaterial', ['entries' => $entries]);
    }

    // status togglen van lesmateriaal op basis van Id
    public function toggleStatus(Request $request)
    {
        // uitlezen id
        $id = $request->get('id');

        // proberen ophalen van lesmateriaal
        $entry = \DB::table('lessonmaterial')->where('id', $id)->limit(null)->get();

        // gevonden
        if ($entry) {
            $status = 1;
            if ($entry[0]['status'] == 1) {
                $status = 0;
            }

            // update query
            $query = \DB::table('lessonmaterial')->where('id', $entry[0]['id'])->update(['status' => $status]);

            if ($query) {
                return redirect('/admin/lesmateriaal');
            }
        }

        return redirect('/'); // default als iets fout gaat
    }

    // zoeken door DB naar een match
    public function searchMaterial(Request $request)
    {
        // uitlezen post
        $searchTerm = $request->get('query');
        $status = $request->get('status');

        $entries = \DB::table('lessonmaterial')->where([['name', 'LIKE', '%'. $searchTerm .'%']])->orWhere([['introduction', 'LIKE', '%'. $searchTerm .'%']])->orderBy('id', 'desc')->limit(null)->get();
        if ($status == 1) {
            $entries = \DB::table('lessonmaterial')->where([['name', 'LIKE', '%'. $searchTerm .'%'],['status', '=', 1]])->orWhere([['introduction', 'LIKE', '%'. $searchTerm .'%'],['status', '=', 1]])->orderBy('id', 'desc')->limit(null)->get();
        }

        return view('admin/allmaterial', ['entries' => $entries, 'searchTerm' => $searchTerm, 'status' => $status]);
    }
}