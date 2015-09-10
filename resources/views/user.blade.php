@extends('parts.layout')
 
@section('content')
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
	<h3>{{ $userData['name'] }} </h3>
		<table class="userinfo">
			<tr>
				<td class='btn_counter'><div class="text">フォロー</div><!-- text -->
				<div class="num">{{ $userData['followee'] }}</div><!-- num --> </td>
				<td class='btn_counter'><div class="text">フォロワー</div><!-- text -->
				<div class="num">{{ $userData['follower'] }}</div><!-- num --> </td>
				<td class='btn_counter'><div class="text">コメント</div><!-- text -->
				<div class="num">{{ $userData['comment'] }}</div><!-- num --> </td>
		@if (Auth::user()->name != $userData['name'] )
		
			@if ($userData['isFollow']>=1)
				<td class="font16"><a class="btn btn-block btn-info" href="/unfollow/{{ $userData['name'] }}">フォロー解除</a></td>
			@else
		    	<td class="font16"><a class="btn btn-block btn-primary" href="/follow/{{ $userData['name'] }}">フォローする</a></td>
			@endif
		@endif
			</tr>
		</table>
	</div><!-- col-xs-12 col-sm-12 col-md-3 col-lg-3 -->
	
	<div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
@foreach ($comments as $comment)
@include('parts.comment', ['comment'=>$comment])
@endforeach
	</div><!-- col-xs-12 col-sm-12 col-md-9 col-lg-9 -->
</div><!-- row -->







@endsection