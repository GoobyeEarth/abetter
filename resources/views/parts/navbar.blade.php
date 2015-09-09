{{-- resouces/views/navbar.blade.php --}}
 
<div class="navbar navbar-default">
    <div class="container">
        <div class="navbar-header">
            <!-- スマホやタブレットで表示した時のメニューボタン -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
 
            
            <a class="navbar-brand hname" href="/">ユーザー名</a>
            <div class="left search_margin">
            	@include('parts.search')
            </div><!-- left -->
            
            
 			
        </div>
 
        <!-- メニュー -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <!-- 左寄せメニュー -->
            <ul class="nav navbar-nav ">
                
                
            </ul>
 			
            <!-- 右寄せメニュー -->
            <ul class="nav navbar-nav navbar-right">
            	
                
                @if (Auth::guest())
                    {{-- ログインしていない時 --}}
 
                    <li><a href="/auth/login">Login</a></li>
                    <li><a href="/auth/register">Register</a></li>
                @else
                	
                	<li class="header_btn">
	                	<a href="follower">
	                		<div class="text">フォロワー</div><!-- text -->
	                		<div class="num">000</div><!-- num -->
	                	</a>
	                </li>
	                <li class="header_btn">
	                	<a href="follower">
	                		<div class="text">フォロー</div><!-- text -->
	                		<div class="num">000</div><!-- num -->
	                	</a>
	                </li>
	                
	                <li class="header_btn">
	                	<a href="follower">
	                		<div class="text">コメント</div><!-- text -->
	                		<div class="num">000</div><!-- num -->
	                	</a>
	                </li>
                    {{-- ログインしている時 --}}
                    <li><a href="/user/">マイページ</a></li>
                    
                    <!-- ドロップダウンメニュー -->
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }}
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="/auth/logout">Logout</a></li>
                        </ul>
                    </li>
                    
                    
                @endif
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</div>
    
