<html lang="ja">
<head>
    <meta content="" name="description">
    <title>編集（完了） | 社員管理システム</title>
    <link href="/" rel="canonical">
    {{ HTML::style('asset/css/pure-min.css') }}
    {{ HTML::style('asset/css/custom.css') }}
</head>
<body>

<header>
    <nav class="home-menu pure-menu pure-menu-horizontal relative">
        <h1 class="pure-menu-heading"><a href="">社員管理システム</a></h1>
        <ul class="pure-menu-list force-right">
            <li class="pure-menu-item"><span class="pure-menu-link">{{User::find($id)->name}}</span></li>
            <li class="pure-menu-item"><a href="{{ URL::route('logout') }}" class="pure-menu-link">ログアウト</a></li>
        </ul>
    </nav>
</header>

<section class="contents">
    <h2>編集（完了）</h2>

    <section>
        <p>
            登録情報を更新しました。
        </p>
        <div>
        <a class="pure-button pure-button-primary" href="{{ URL::route('employee.getconf',$id) }}">戻る</a>
        </div>
    </section>
</section>

@include('layout.footer')

</body>
</html>
