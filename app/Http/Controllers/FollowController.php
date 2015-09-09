<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Comment;
use App\User;
use App\Following;

class FollowController extends Controller
{
	public function userIndex(){
		$names = User::all()->pluck('name');
		return view('user_index', compact('names'));
		
	}
	
	public function searchUser(){
		$search =\Request::input('search');
		$result =User::select('name')->where('name','like', '%'.$search.'%')->get();
		return view('search_result',compact('result'));
	}
	
	public function haveFollowed($name){
		$follower = \Auth::user()->name;
		$followee = $name;
		if($followee == $follower){
			return view('have_followed', compact('followee'));
		}
		else{
			
			DB::table('followings')
			->insert(array('follower' => $follower,
					'followee' => $followee
			));
			
						
		}
		
		return view('have_followed',compact('followee'));
	}
	
	public function unfollowed($name){
		$follower = \Auth::user()->name;
		$followee = $name;
		DB::table('followings')
		->where('follower', '=', $follower)
		->where('followee', '=', $followee)
		->delete();
	}
	
}
