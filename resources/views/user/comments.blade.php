@extends('layout')
 
@section('content')
<p>user comemnt</p>
<form class="form-horizontal" role="form" method="POST" action="/abeet">
	{{-- CSRF対策--}} <input type="hidden" name="_token" value="{{ csrf_token() }}">

	<div class="form-group">
		<div class="col-md-6">
			<input type="text" class="form-control" name="comment" maxlength ="140">
		</div>
	</div>

	<div class="form-group">
		<div class="col-md-6 col-md-offset-4">
			<button type="submit" class="btn btn-primary"
				style="margin-right: 15px;">Abeet</button>
			
		</div>
	</div>
</form>
<table>
	<tr>
		<th>id</th><th>name</th><th>comment</th><th>updated_at</th>
	</tr>
	
	@foreach ($comments as $comment)
		<tr>
			<td>{{ $comment->comment }} </td>
			<td>{{ $comment->id }} </td>
			<td>{{ $comment->name }} </td>
			<td>{{ $comment->updated_at }} </td>
		</tr>
	@endforeach
</table>


@endsection