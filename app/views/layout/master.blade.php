<html lang="ja">
<head>
    <meta content="社員管理システム ログインページです。" name="description">
    <title>ログイン | 社員管理システム</title>
    <link href="/login" rel="canonical">
    {{ HTML::style('asset/css/pure-min.css') }}
    {{ HTML::style('asset/css/custom.css') }}
</head>
<body>
@include('layout.header')
@yield('content')
@include('layout.footer')
</body>
</html>