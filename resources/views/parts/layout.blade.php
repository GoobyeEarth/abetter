 
<!DOCTYPE HTML>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>Abetter</title>
 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/common.css">
    <script type="text/javascript" src="/jquery.js"></script>
    <script src="/jquery.fittext.js" type="text/javascript"></script>
    
</head>
 
<body>
	 {{-- ナビゲーションバーの Partial を使用 --}}
    @include('parts.navbar')
    <div class="container">
        @yield('content')
    </div><!-- container -->
     
    <!-- Scripts --><!-- ③ 追加 -->
    
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>