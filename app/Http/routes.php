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

Route::get('/', 'CommentsController@main');
Route::controller('auth', 'Auth\AuthController');
Route::post('abeet', 'CommentsController@abeet');
Route::get('user/{name}', 'CommentsController@userComments');
Route::get('search', function(){
	return view('search');
});
Route::post('search/result', 'FollowController@searchUser');

Route::get('search/result/{search}', 'FollowController@searchResult');
Route::get('search/result', 'FollowController@redirect');
Route::get('follow/{name}','FollowController@follow');
Route::get('unfollow/{name}', 'FollowController@unfollow');
Route::get('follower', 'FollowController@follower');
Route::get('followee', 'FollowController@followee');

Route::get('delete/comment/{id}', 'CommentsController@delete');
Route::post('edit/comment/{id}', 'CommentsController@edit');