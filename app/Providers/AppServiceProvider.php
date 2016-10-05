<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use DB;
use Auth;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {



//    if(Auth::check()){
//
//        if(auth()->user()){

//            view()->composer('layouts.main',function($view){
//
//                $notification = DB::table('users')
//
//                    ->join('notification', 'users.id', '=', 'notification.comments_user_id')
//                    ->select('users.*', 'notification.*')
//                    ->orderBy('notification.created_at','desc')
//
//                    ->where('notification.question_user_id',auth()->user()->id)
//                    ->groupBy('notification.question_id')
//                    ->get();
//
////                dd($notification);
//
//                if(!is_null($notification)){
//                    $view->with('notification', $notification);
//                }
//
//            });
//        }
//
//    }


    }



    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
