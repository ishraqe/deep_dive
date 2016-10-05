<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Tag;
use App\User;
use Session;
use DB;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index(){

        return view('admin.index');
    }

    public function tag(){
        $tag=Tag::all();
        $index=1;
        return view('admin.tag')->with(['tag' =>$tag, 'index' => $index ]);
    }
    public function addAdmin(){

        return view('admin.newAdmin');
    }
    public function newAdmin(Request $request){
        $request['rating']=0;
        $request['badges']=0;
        $request['admin']=1;

        $this->validate($request, [
            'username' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
         User::create([
            'username' => $request['username'],
            'email' => $request['email'],
            'admin' => $request['admin'],
            'password' => bcrypt($request['password']),
            'rating' =>$request['rating'],
            'badges' =>$request['badges'],
        ]);
        Session::flash('flash_message','New admin has been created!');
        return view('admin.newAdmin');
    }
    public function getAdmin(){
        $admin  = DB::table('users')->where('admin',1)->get();
        $index=1;
        return view('admin.getAdmin')->with([
            'admin'=> $admin,
            'index' => $index,
        ]);

    }
    public function destroy($id)
    {
        $user=User::findOrfail($id)->delete();


        Session::flash('flash_message','Admin has benn deleted!');

        return redirect('/admin/deleteAdmin');
    }

    public function update($id){
        $user=User::findOrfail($id);
        if(is_null($user)){
            abort(404);
        }
        return view('admin/adminEdit')->with('user',$user);

    }
    public function getUser(){
        $user = DB::table('users') ->where('rating', '<=', -20)->where('admin','=',0 )->get();
        $index=1;
        return view('admin.getuser')->with([
            'user' => $user,
            'index' => $index,
        ]);
    }
}
