<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Question;
use App\Notification;
use App\User;

class notificationController extends Controller
{
    public function getNotification(){

        $notification = DB::table('users')
            ->join('notification', 'users.id', '=', 'notification.comments_user_id')
            ->select('users.*', 'notification.*')
            ->orderBy('notification.created_at','desc')
            ->where('notification.question_user_id',auth()->user()->id)
            ->limit(2)
            ->get();



        return view('pages.notification.notification')->with([
            'notification'=> $notification,

        ]);
    }
}
