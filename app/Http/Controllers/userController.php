<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Question;
use Session;

class userController extends Controller
{


    public function addAdmin(){

    }
    public function updateImage(Request $request,$id) {
        $image = $request->file('user_image');
        if ($image) {
            $image_name = str_random(20);
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $destination_path = 'user_images/';
            $image_url = $destination_path . $image_full_name;
            $success = $request->file('user_image')->move($destination_path, $image_full_name);

            if ($success) {

                $data=User::findOrfail($id);

                $data->user_image = $image_url;
                $data->update();


            }
        }
        return redirect()->back();
    }
    public function updatePass(Request $request,$id){

        $this->validate($request, [
            'password'  =>'required',

        ]);

        $user=User::findOrfail($id);

        if(is_null($user)){
            abort(404);
        }
        $user->update([

            'password' =>bcrypt($request['password']),
        ]);


        Session::flash('flash_message','Your tag has been created!');

        return redirect('/home')->with([

        ]);
    }

    public function getUser($id){

        $user=User::findOrFail($id);
        if(is_null($user)){
            abort(404);
        }
        $question = Question::orderBy('marking', 'desc')
            ->where('user_id',$id)
            ->where('parent_id',null)
            ->paginate(7);



        return view('pages.user.user')->with([
            'user'=> $user,
            'question' => $question,
        ]);
    }


}
