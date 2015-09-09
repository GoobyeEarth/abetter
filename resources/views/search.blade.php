<form class="form-horizontal" role="form" method="POST" action="/search/result">
	{{-- CSRF対策--}}
	<input type="hidden" name="_token" value="{{ csrf_token() }}">

	<div class="form-group">
		<div class="col-md-6">
			<input type="text" class="form-control" name="search" maxlength ="140">
		</div>
	</div>

	<div class="form-group">
		<div class="col-md-6 col-md-offset-4">
			<button type="submit" class="btn btn-primary"
				style="margin-right: 15px;">Abeet</button>
			
		</div>
	</div>
</form>