
@extends('parts.layout')

@section('content')

@include('parts.search')
<h2>検索結果:</h2>
<table class="userindex" cellpadding="5">
@for ($i = 0; $i < count($resultData); $i++) 
	@include('parts.userlist', ['userData' => $resultData[$i] ])
@endfor
</table>
@endsection