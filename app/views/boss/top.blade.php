<!DOCTYPE html>
<html lang="ja">
<head>
    <meta content="" name="description">
    <title>社員管理システム</title>
    <link href="/" rel="canonical">
    {{ HTML::style('asset/css/pure-min.css') }}
    {{ HTML::style('asset/css/custom.css') }}
</head>
<body>

<header>
    <nav class="home-menu pure-menu pure-menu-horizontal relative">
        <h1 class="pure-menu-heading"><a href="">社員管理システム</a></h1>
        <ul class="pure-menu-list force-right">
            <li class="pure-menu-item"><span class="pure-menu-link">岸 由一郎</span></li>
            <li class="pure-menu-item"><a href="{{ URL::route('boss.search') }}" class="pure-menu-link">検索</a></li>
            <li class="pure-menu-item"><a href="" class="pure-menu-link">追加</a></li>
            <li class="pure-menu-item"><a href="{{ URL::route('logout') }}" class="pure-menu-link">ログアウト</a></li>
        </ul>
    </nav>
</header>

<section class="contents">
    <h2>トップページ</h2>

    <nav class="pure-menu pure-menu-horizontal">
        <ul class="pure-menu-list">
            <li class="pure-menu-item"><a href="" class="pure-menu-link pure-button">first</a></li>
            <li class="pure-menu-item"><a href="" class="pure-menu-link pure-button">back</a></li>
            <li class="pure-menu-item">...</li>
            <li class="pure-menu-item"><a href="" class="pure-menu-link pure-button">3</a></li>
            <li class="pure-menu-item"><button class="pure-button pure-button-disabled">4</button></li>
            <li class="pure-menu-item"><a href="" class="pure-menu-link pure-button">5</a></li>
            <li class="pure-menu-item">...</li>
            <li class="pure-menu-item"><a href="" class="pure-menu-link pure-button">next</a></li>
            <li class="pure-menu-item"><a href="" class="pure-menu-link pure-button">last</a></li>
        </ul>
    </nav>

    <section>
        <table class="pure-table pure-table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>名前</th>
                    <th>メールアドレス</th>
                    <th>電話番号</th>
                    <th>生年月日</th>
                    <th>更新日時</th>
                </tr>
            </thead>
            <tbody>
            @foreach($list_users as $list_user)
                <tr class="pure-table-odd">
                    <td>{{$list_user['id']}}</td>
                    <td><a href="{{ URL::route('employee.detail',$list_user['id']) }}">{{$list_user['name']}}({{EMPLOY_PERMISSION}})</a></td>
                    <td>{{$list_user['email']}}</td>
                    <td>{{$list_user['telephone_no']}}</td>
                    <td>{{$list_user['birthday']}}</td>
                    <td>{{$list_user['updated_at']}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </section>

    <nav class="pure-menu pure-menu-horizontal">
        <ul class="pure-menu-list">
            <li class="pure-menu-item"><a href="" class="pure-menu-link pure-button">first</a></li>
            <li class="pure-menu-item"><a href="" class="pure-menu-link pure-button">back</a></li>
            <li class="pure-menu-item">...</li>
            <li class="pure-menu-item"><a href="" class="pure-menu-link pure-button">3</a></li>
            <li class="pure-menu-item"><button class="pure-button pure-button-disabled">4</button></li>
            <li class="pure-menu-item"><a href="" class="pure-menu-link pure-button">5</a></li>
            <li class="pure-menu-item">...</li>
            <li class="pure-menu-item"><a href="" class="pure-menu-link pure-button">next</a></li>
            <li class="pure-menu-item"><a href="" class="pure-menu-link pure-button">last</a></li>
        </ul>
    </nav>
</section>

@include('layout.footer')

</body>
</html>
