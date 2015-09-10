@extends('parts.layout')
@section('content')
<h1 class="align_center">フォロー中一覧</h1>
<table class="userindex" cellpadding="5">
@for ($i = 0; $i < count($followeesData); $i++) 
	@include('parts.userlist', ['userData' => $followeesData[$i] ])
@endfor
</table>
@endsection