<?php

use App\Http\Controllers\CommentsController;
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'CommentsController@followerComments');
Route::controller('auth', 'Auth\AuthController');
Route::post('abeet', 'CommentsController@abeet');
Route::get('user/{name}', 'CommentsController@userComments');
Route::get('index/user', 'FollowController@userIndex');
Route::get('search', function(){
	return view('search');
});
Route::post('search/result', 'FollowController@searchUser');
Route::get('follow/{name}','FollowController@haveFollowed');
Route::get('unfollow/{name}', 'FollowController@unfollowed');
