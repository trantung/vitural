<!DOCTYPE html>
<html lang="ja">
<head>
    <meta content="" name="description">
    <title>追加（確認） | 社員管理システム</title>
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
    <h2>追加（確認）</h2>

    <section>
    {{Form::open(array('method'=>'GET','id'=>'form','route'=>array('employee.editdetail','id'=>$user_detail->id),'class' => 'pure-form pure-u-3-4'))}}
        <table class="pure-table pure-table-bordered" width="100%">
            <tbody>
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
                    <th>ノート</th>
                    <td>{{$comment['content']}}
                    </td>
                </tr>
                <tr>
                    <th>権限</th>
                    <td>従業員</td>
                </tr>
                <tr>
                    <th>BOSS</th>
                    <td>{{$boss->name}}</td>
                </tr>
                <tr>
                    <td colspan="2" align="right">
                        <a class="pure-button pure-button-primary" href="{{ URL::route('boss.top') }}">戻る</a>
                        {{ Form::submit('登録',array('class'=>'pure-button button-error')) }}
                    </td>
                </tr>
            </tbody>
        </table>
        {{Form::close()}}
    </section>
</section>

@include('layout.footer')

</body>
</html>