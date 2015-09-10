<tr>
		<td><a href="/user/{{ $userData['name'] }}">{{ $userData['name'] }}</a></td>
		<td class='btn_counter'><div class="text">フォロー</div><!-- text -->
		<div class="num">{{ $userData['followee'] }}</div><!-- num --> </td>
		<td class='btn_counter'><div class="text">フォロワー</div><!-- text -->
		<div class="num">{{ $userData['follower'] }}</div><!-- num --> </td>
		<td class='btn_counter'><div class="text">コメント</div><!-- text -->
		<div class="num">{{ $userData['comment'] }}</div><!-- num --> </td>
		
	@if ($userData['isFollow']>=1)
		<td class="font16"><a class="btn btn-block btn-info" href="/unfollow/{{ $userData['name'] }}">フォロー解除</a></td>
	@else
    	<td class="font16"><a class="btn btn-block btn-primary" href="/follow/{{ $userData['name'] }}">フォローする</a></td>
	@endif

	</tr>