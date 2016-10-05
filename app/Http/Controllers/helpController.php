<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Question;
use App\Tag;

class helpController extends Controller
{


  public function tour(){
      return view('pages.help.tour');
  }


    public function about(){
        $question=Question::all()->where('parent_id',null);
        $user = User::where('admin',0)->get();
        $tag =Tag::all();


        return view('pages.help.about')->with([
            'question' => $question,
            'user'     => $user,
            'tag'    => $tag
        ]);
    }


    public function contact(){
        return view('pages.help.contact');
    }
//
//    public function help_center(){
//        return view('pages.help.help_center');
//    }

}
