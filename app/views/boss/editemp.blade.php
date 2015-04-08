<!DOCTYPE html>
<html lang="ja">
<head>
    <meta content="" name="description">
    <title>編集 | 社員管理システム</title>
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
            <li class="pure-menu-item"><a href="" class="pure-menu-link">編集</a></li>
            <li class="pure-menu-item"><a href="{{ URL::route('logout') }}" class="pure-menu-link">ログアウト</a></li>
        </ul>
    </nav>
</header>

<section class="contents">
    <h2>編集</h2>

    <section>
    {{Form::open(array('id'=>'form','route'=>array('employee.editdetailconf','id'=>$id),'class' => 'pure-form pure-u-3-4'))}}
        <table class="pure-table pure-table-bordered" width="100%">
            <tbody>
                <tr>
                    <th>ID</th>
                    <td>{{$user_detail->id}}</td>
                </tr>
                <tr>
                    <th>名前</th>
                    <td>
                   {{Form::text('name',$user_detail->name, array('class'=>'pure-input-1'))}}
                    </td>
                </tr>
                <tr>
                    <th>名前（カナ）</th>
                    <td>{{Form::text('kana',$user_detail->kana, array('class'=>'pure-input-1'))}}</td>
                </tr>
                <tr>
                    <th>メールアドレス</th>
                    <td>{{Form::text('email',$user_detail->email, array('class'=>'pure-input-1'))}}</td>
                </tr>
                <tr>
                    <th>メールアドレス（確認）</th>
                    <td>{{Form::text('email_conf',$user_detail->email, array('class'=>'pure-input-1'))}}</td>
                </tr>
                <tr>
                    <th>電話番号</th>
                    <td>{{Form::text('telephone_no',$user_detail->telephone_no, array('class'=>'pure-input-1'))}}</td>
                </tr>
                <tr>
                    <th>生年月日</th>
                    <td>{{Form::text('birthday',$user_detail->birthday, array('class'=>'pure-input-1'))}}</td>
                </tr>
                <tr>
                    <th>ノート</th>
                    <td><textarea name="note" class="pure-input-1">{{$comment['content']}}</textarea></td>
                </tr>
                <tr>
                    <th>パスワード</th>
                    <td>{{Form::text('password','', array('class'=>'pure-input-1'))}}</td>
                </tr>
                <tr>
                    <th>権限</th>
                    <td>
                        <select name="roll" class="pure-input-1">
                            <option value="">従業員</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th>BOSS</th>
                    <td>
                        <select name="roll" class="pure-input-1">
                            <option value="">--</option>
                            @foreach($boss as $value)
                            <option value="">{{$value['name']}}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" align="right">
                        <a class="pure-button pure-button-primary" href="{{URL::route('employee.detail',$id)}}">戻る</a>
                        {{ Form::submit('確認',array('class'=>'pure-button button-error')) }}
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
