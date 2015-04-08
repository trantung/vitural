<!DOCTYPE html>
<html lang="ja">
<head>
    <meta content="" name="description">
    <title>検索 | 社員管理システム</title>
    <link href="/" rel="canonical">
    {{ HTML::style('asset/css/pure-min.css') }}
    {{ HTML::style('asset/css/custom.css') }}
</head>
<body>

<header>
    <nav class="home-menu pure-menu pure-menu-horizontal relative">
        <h1 class="pure-menu-heading"><a href="">社員管理システム</a></h1>
        <ul class="pure-menu-list force-right">
            <li class="pure-menu-item"><span class="pure-menu-link">飯塚 浩二（管理者）</span></li>
            <li class="pure-menu-item"><a href="{{ URL::route('boss.search') }}" class="pure-menu-link">検索</a></li>
            <li class="pure-menu-item"><a href="" class="pure-menu-link">追加</a></li>
            <li class="pure-menu-item"><a href="{{ URL::route('logout') }}" class="pure-menu-link">ログアウト</a></li>
        </ul>
    </nav>
</header>

<section class="contents">
    <h2>検索</h2>

    <section>
{{Form::open(array('method'=>'GET','id'=>'form','route'=>array('boss.search_detail'),'class' => 'pure-form'))}}
        <table class="pure-table pure-table-bordered">
            <tbody>
                <tr>
                    <td>名前</td>
                    <td>
                    {{Form::text('name')}}
                    </td>
                    <td>メールアドレス</td>
                    <td>{{Form::text('email')}}</td>
                </tr>
                <tr>
                    <td>名前（カナ）</td>
                    <td>{{Form::text('kana')}}</td>
                    <td>電話番号</td>
                    <td>{{Form::text('telephone_no')}}</td>
                </tr>
                <tr>
                    <td>生年月日</td>
                    <td colspan="3">
                    {{Form::text('start_date','', array('placeholder'=>'開始日'))}}
                        &nbsp;～&nbsp;
                        {{Form::text('end_date','', array('placeholder'=>'終了日'))}}
                    </td>
                </tr>
                <tr>
                    <td colspan="4" align="right">
                        <button class="pure-button pure-button-primary" type="submit">検索</button>
                    </td>
                </tr>
            </tbody>
        </table>
        {{Form::close()}}
    </section>
</section>
<footer>
Employer Management System
</footer>

</body>
</html>
