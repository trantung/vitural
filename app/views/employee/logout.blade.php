<html lang="ja">
<head>
    <meta content="" name="description">
    <title>ログアウト | 社員管理システム</title>
    <link href="/" rel="canonical">
    {{ HTML::style('asset/css/pure-min.css') }}
    {{ HTML::style('asset/css/custom.css') }}
</head>
<body>

<header>
    <nav class="home-menu pure-menu pure-menu-horizontal relative">
        <h1 class="pure-menu-heading"><a href="">社員管理システム</a></h1>
        <ul class="pure-menu-list force-right">
            <li class="pure-menu-item"><a href="{{ URL::route('vitural.getlogin') }}" class="pure-menu-link">ログイン</a></li>
        </ul>
    </nav>
</header>

<section class="contents">
    <h2>ログアウト</h2>

    <section>
        <p>
            ログアウトしました。
        </p>
    </section>
</section>
@include('layout.footer')
</body>
</html>
