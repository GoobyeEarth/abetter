<div class="comment">
	<div class="left name">{{ $comment->name }}</div>
	<div class="left date">{{ $comment->updated_at }}</div>
@if (\Auth::guest())
	   

@else
	@if (Auth::user()->name==$comment->name)
    <div class="right delete"><a href="/delete/comment/{{ $comment->id }}">
    	<span class="glyphicon glyphicon-trash" aria-hidden="false"></span>
    </a></div>
	<div class="right edit"><a href="javascript:void(0);" onClick="editview({{ $comment->id }})">
		<span class="glyphicon glyphicon-pencil" aria-hidden="false"></span>
	</a>
	</div>
	
	
	@endif
     
@endif
	<div id="comment{{ $comment->id }}" class="clear mes">{{ $comment->comment }}</div>
	
	<div id="editview{{ $comment->id }}" class="editview" style="display: none;">
		<form class="form-vertical" role="form" method="POST" action="/edit/comment/{{ $comment->id }}" >
			{{-- CSRF対策--}}
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<input class="form-control" type="text" name="editcomment" value="{{ $comment->comment }} " maxlength="260" width="auto" >
		</form>
	</div>	
</div>
