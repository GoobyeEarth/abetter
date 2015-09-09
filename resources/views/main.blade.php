@extends('parts.layout')
 
@section('content')
<form class="form-horizontal" role="form" method="POST" action="/abeet">
	{{-- CSRF対策--}} <input type="hidden" name="_token" value="{{ csrf_token() }}">

	<div class="form-group">
			<input type="text" class="form-control" name="comment" maxlength ="140">
	</div>

	<div class="form-group align_center">
			<button type="submit" class="btn btn-primary btn-lg">Abeet</button>
	</div>
</form>

@foreach ($comments as $comment)
<div class="comment">
	<div class="left name">{{ $comment->name }}</div>
	<div class="left date">{{ $comment->updated_at }}</div>
	<div class="right delete"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></div>
	<div class="right edit"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></div>
	<div class="clear mes">{{ $comment->comment }}</div>
	
</div>
@endforeach




@endsection


 