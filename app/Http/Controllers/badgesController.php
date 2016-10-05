<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;

class badgesController extends Controller
{
   public function index(){

       $badges=User::all();

       return view('pages.badges.index')->with('badges',$badges);
   }

}
