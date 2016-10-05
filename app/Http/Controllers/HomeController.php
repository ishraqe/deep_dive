<?php

namespace App\Http\Controllers;
use App\Http\Requests;
use App\Question;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $user_id=auth()->user()->id;

        $question = Question::orderBy('marking', 'desc')
            ->where('user_id',$user_id)
            ->where('parent_id',null)
            ->paginate(7);

        if($question){
            return view('home')->with('question',$question);
        }



    }
}
