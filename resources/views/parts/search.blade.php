<form class="form-vertical" role="form" method="POST" action="/search/result" >
	{{-- CSRF対策--}}
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<input class="form-control" type="text" name="search" placeholder="ユーザーを検索" maxlength="260" width="auto" >
</form>