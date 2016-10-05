<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/





/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/
Route::group(['middleware' => ['web']], function () {
    //user routes
    Route::get('/', 'questionController@index');
    Route::get('questions','questionController@index');
    Route::get('/questions/create','questionController@create');
    Route::post('questions','questionController@store');
    Route::get('/search','searchController@getResults');

    Route::post('answer/{id}','questionController@addAnswer');
    Route::post('comment/{id}','questionController@addComment');
    Route::post('/arrow_up/{id}','questionController@addMark');
    Route::post('/arrow_down/{id}','questionController@minusMark');
    Route::post('/arrow_up_comment/{id}','questionController@addCommentMark');
    Route::post('/arrow_down_comment/{id}','questionController@minusCommentMark');

    Route::get('/tags','tagController@index');
    Route::get('/tags/description/{id}','tagController@description');
    Route::get('/tagSearch','tagController@getTags');
    Route::post('/image/{id}','userController@updateImage');
    Route::get('/badges' , 'badgesController@index');
    Route::get('/user/{id}','userController@getUser');



    //help routes
    Route::get('/tour','helpController@tour');
    Route::get('/about_us','helpController@about');
    Route::get('/contact_us', 'helpController@contact');
//    Route::get('/help_center','helpController@help_center');

    //Notification
    Route::get('/notification','notificationController@getNotification');

});
//admins routs

Route::get('admin', 'AdminController@index');
Route::get('admin/tag', 'AdminController@tag');
Route::post('/admin/tag','tagController@add');
Route::get('/admin/tag/delete/{id}','tagController@destroy');
Route::get('/admin/tag/update/{id}','tagController@update');
Route::post('/admin/tag/update/{id}','tagController@postUpdate');
Route::get('/admin/newAdmin','AdminController@addAdmin');
Route::post('/addAdmin','AdminController@newAdmin');
Route::get('/admin/deleteAdmin','AdminController@getAdmin');
Route::get('/admin/deleteAdmin/delete/{id}','AdminController@destroy');
Route::get('/admin/getUser','AdminController@getUser');



Route::group(['middleware' => 'web'], function () {
    Route::auth();
    Route::get('/home', 'HomeController@index');
    Route::get('/home/tag','tagController@showTag');

    Route::post('/updatePassword/{id}','userController@updatePass');
    Route::get('/{id}','questionController@show');
});

