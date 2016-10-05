<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\Question;
use App\Http\Requests;

class searchController extends Controller
{
    public function getResults(Request $request)
    {
        $query = $request->input('query');
        if ($query == null) {
            return redirect()->back();
        }

        $question = Question::where(DB::raw('title'), 'LIKE', "%{$query}%")->get();



        return view('pages.search.result')->with('question', $question);


    }
}
