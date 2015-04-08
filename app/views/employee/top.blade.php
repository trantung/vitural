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
            <li class="pure-menu-item"><span class="pure-menu-link">{{$user_detail->name}}</span></li>
            <li class="pure-menu-item"><a href="{{ URL::route('logout') }}" class="pure-menu-link">ログアウト</a></li>
        </ul>
    </nav>
</header>

<section class="contents">
    <h2>トップページ</h2>

    <section>
        <table class="pure-table pure-table-bordered" width="100%">
            <tbody>
                <tr>
                    <th>ID</th>
                    <td>{{$user_detail->id}}</td>
                </tr>
                <tr>
                    <th>名前</th>
                    <td>{{$user_detail->name}}</td>
                </tr>
                <tr>
                    <th>名前（カナ）</th>
                    <td>{{$user_detail->kana}}</td>
                </tr>
                <tr>
                    <th>メールアドレス</th>
                    <td>{{$user_detail->email}}</td>
                </tr>
                <tr>
                    <th>電話番号</th>
                    <td>{{$user_detail->telephone_no}}</td>
                </tr>
                <tr>
                    <th>生年月日</th>
                    <td>{{$user_detail->birthday}}</td>
                </tr>
                <tr>
                    <td colspan="2" align="right">
                        <a class="pure-button button-secondary" href="{{ URL::route('employee.edit',$user_detail->id) }}">編集</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </section>
</section>
</section>
@include('layout.footer')
</body>
</html>
