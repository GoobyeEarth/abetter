@extends('parts.layout')
@section('content')
<h1 class="align_center">フォロワ一 一覧</h1>
<table class="userindex" cellpadding="5">
	
@for ($i = 0; $i < count($followersData); $i++) 
	@include('parts.userlist', ['userData' => $followersData[$i] ])
@endfor

	</table>
@endsection