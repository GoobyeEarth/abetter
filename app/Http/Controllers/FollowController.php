<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

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
		return redirect('/search/result/'.$search);
	}
	
	public function searchResult($search){
		$result =User::select('name')->where('name','like', '%'.$search.'%');
		if(\Auth::guest()){
			$result = $result->get();
		}
		else{
			$result = $result->where('name', '!=', \Auth::user()->name)->get();
		}
		
		$resultData = Array();
		for($i = 0; $i < count($result); $i++) {
			$resultData[$i] = FollowController::userData($result[$i]->name);
		}
		//for header
		$headerData = CommentsController::header();
		return view('search_result', compact('headerData','resultData'));
	}
	
	public function redirect(){
		return redirect('/');
	}
	
	public function follow($name){
		if(\Auth::guest()) return redirect('/');
		$follower = \Auth::user()->name;
		$followee = $name;
		if($followee == $follower){
			return Redirect::back();
		}
		else{
			
			$count = User::where('name','=',$name)->count();
			if($count==0){
				\Flash::warning('ユーザー名：'.$name.'は存在しません。');
			}
			else if($count==1){
				if(FollowController::isFollow($name)==0){
					DB::table('followings')
					->insert(array('follower' => $follower,
							'followee' => $followee
					));
					\Flash::success($name.'をフォローしました。');
				}
				else{
					\Flash::warning($name.'はすでにフォローしています。');
				}
			}
				
		}
		return Redirect::back();
	}
	
	public function unfollow($name){
		if(\Auth::guest()) return redirect('/');
		$follower = \Auth::user()->name;
		$followee = $name;
		DB::table('followings')
		->where('follower', '=', $follower)
		->where('followee', '=', $followee)
		->delete();
		
		\Flash::success($name.'へのフォローを解除しました。');
		return Redirect::back();
	}
	
	public function followee(){
		if(\Auth::guest()) return redirect('/');
		$followees = $this->getFollowee();
		
		$followeesData = Array();
		for($i = 0; $i < count($followees); $i++) {
			$followeesData[$i] = FollowController::userData($followees[$i]->followee);
		}
		$headerData = CommentsController::header();
		return view('followee', compact('headerData','followeesData'));
	}
	
	public function follower(){
		if(\Auth::guest()) return redirect('/');
		$followers = $this->getFollower();
		
		$followersData = Array();
		for($i = 0; $i < count($followers); $i++) {
			$followersData[$i] = FollowController::userData($followers[$i]->follower);
		}
		
		//for header
		$headerData = CommentsController::header();
		return view('follower', compact('headerData','followersData'));
	}
	
	///////////////////////////////////////////////////////////////
	public static function getFollowee(){
		$follower = \Auth::user()->name;
		$followees = DB::table('followings')
		->select('followee')
		->where('follower','=',$follower)
		->get();
		return $followees;
	}
	
	public static function getFollower(){
		$followee = \Auth::user()->name;
		$followers = DB::table('followings')
		->select('follower')
		->where('followee','=',$followee)
		->get();
		return $followers;
	}
	
	public static function getCountFollower($followee){
		$count = DB::table('followings')->where('followee','=', $followee)->count();
		return $count;
	}
	
	public static function getCountFollowee($follower){
		$count =DB::table('followings')->where('follower', '=', $follower)->count();
		return $count;
	}
	
	public static function getCounter($name){
		$count['followee'] = FollowController::getCountFollowee($name);
		$count['follower'] = FollowController::getCountFollower($name);
		$count['comment'] = CommentsController::getCountComments($name);
		return $count;
	}
	
	public static function isFollow($followee){
		if(\Auth::guest()){
			return -1;
		}
		else{
			$count =DB::table('followings')
			->where('follower','=', \Auth::user()->name)
			->where('followee','=', $followee)
			->count();
			return $count;
		}
		
	}
	
	public static function userData($name){
		$data = FollowController::getCounter($name);
		$data['name'] = $name;
		$data['isFollow'] = FollowController::isFollow($name);
		
		return $data;
	}
	
	
	
	
}
