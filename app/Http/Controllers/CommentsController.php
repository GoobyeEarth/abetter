<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Comment;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;


class CommentsController extends Controller
{	
	
	public function abeet(){
		$comment = new Comment();
		
		$comment->name= \Auth::user()->name;
		$comment->comment=\Request::input('comment');
		$comment->save();
		return redirect('/');
		
	}
	
	public function delete($id){
		if(\Auth::guest()){
			
		}
		else{
			$comment = Comment::findOrFail($id);
			
			if(\Auth::user()->name == $comment->name){
				$comment->delete();
				\Flash::success('コメントを削除しました');
			}
			
			
			
		}
		return  Redirect::back();
	}
	
	
	public function userComments($name){
		$comments = Comment::where('name','=',$name)->get();
		//for header
		$headerData = CommentsController::header();
		return view('user', compact('headerData','comments'));
	}
	
	public function main(){
		if(\Auth::guest()){
			return view('start');
		}
		else{
			$followees = FollowController::getFollowee();
			$comments = $this->getFolloweesComments($followees);
			
			//for header
		$headerData = CommentsController::header();
		return view('main', compact('headerData','comments'));
		}
		
	}
	
	private function getFolloweesComments($followees){
		$comments = Comment::where('name', '=',\Auth::user()->name);
		foreach ($followees as $followee){
			$comments = $comments->orWhere('name', '=', $followee->followee);
		}
		$comments = $comments->get();
			
		return $comments;
		
	}
	public static function getCountComments($name){
		$count = Comment::where('name', '=', $name)->count();
		return $count;
	}
	
	public static function header(){
		
		if(\Auth::guest()){
			$count=null;
		}
		else{
			$count = FollowController::getCounter(\Auth::user()->name);
		}
		return $count;
	}
	
	
	
	
	
}
