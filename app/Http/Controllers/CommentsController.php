<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Comment;
use Illuminate\Support\Facades\DB;


class CommentsController extends Controller
{
	public function getAllComments(){
		$comments = Comment::all();
		return view('comments', compact('comments'));
		
	}
	public function abeet(){
		$comment = new Comment();
		
		$comment->name= \Auth::user()->name;
		$comment->comment=\Request::input('comment');
		$comment->save();
		return redirect('/');
		
	}
	
	public function userComments($name){
		$comments = Comment::where('name','=',$name)->get();
		return view('user.comments', compact('comments'));
	}
	
	public function followerComments(){
		$followees = $this->getFollower();
		$comments = Comment::where('name', '=',\Auth::user()->name);
		foreach ($followees as $followee){
			$comments = $comments->orWhere('name', '=', $followee->followee);
		}
		$comments = $comments->get();
	
		
		
		
		return view('comments', compact('comments'));
	}
	
	private function getFollower(){
		$follower = \Auth::user()->name;
		$followees = DB::table('followings')
		->select('followee')
		->where('follower','=',$follower)
		->get();
		return $followees;
	}
}
