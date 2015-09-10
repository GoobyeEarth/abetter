<div class="comment">
	<div class="left name">{{ $comment->name }}</div>
	<div class="left date">{{ $comment->updated_at }}</div>
@if (\Auth::guest())
	   

@else
@if (Auth::user()->name==$comment->name)
    <div class="right delete"><a href="/delete/comment/{{ $comment->id }}">
    <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
    </a></div>
	<div class="right edit"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></div>
	
@endif
     
@endif
	<div class="clear mes">{{ $comment->comment }}</div>
	
</div>