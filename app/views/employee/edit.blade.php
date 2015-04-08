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
            <li class="pure-menu-item"><span class="pure-menu-link">{{$user_detail->name}}</span></li>
            <li class="pure-menu-item"><a href="{{ URL::route('logout') }}" class="pure-menu-link">ログアウト</a></li>
        </ul>
    </nav>
</header>

<section class="contents">
    <h2>編集</h2>

    <section>
    <?php 
        $error_box = ERROR_BOX;
        $error_messages = ERROR_MESSAGES;
    ?>
    <section class="error-box">
    @if(Session::has('message') && $error_box == 1)
        <h3>!!ERROR!!</h3>
    @endif
    @if($errors->has() && $error_box == 1)
        <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
         </ul>
    @endif
    </section>
{{Form::open(array('id'=>'form','route'=>array('employee.conf','id'=>$user_detail->id),'class' => 'pure-form pure-u-3-4'))}}
        <table class="pure-table pure-table-bordered" width="100%">
            <tbody>
                <tr>
                    <th>ID</th>
                    <td>{{$user_detail->id}}</td>
                </tr>
                <tr>
                    <th>名前</th>
                    <td>
                     {{ Form::text('name',$user_detail->name,array('class'=>'pure-input-1')) }}
                    </td>
                </tr>
                <tr>
                    <th>名前（カナ）</th>
                    <td>{{ Form::text('kana',$user_detail->kana,array('class'=>'pure-input-1')) }}</td>
                </tr>
                <tr>
                    <th>電話番号</th>
                    <td>{{ Form::text('telephone_no',$user_detail->telephone,array('class'=>'pure-input-1')) }}</td>
                </tr>
                <tr>
                    <th>生年月日</th>
                    <td>{{ Form::text('birthday',$user_detail->birthday,array('class'=>'pure-input-1')) }}</td>
                </tr>
                <tr>
                    <th>パスワード</th>
                    <td>
                        {{ Form::text('password','',array('class'=>'pure-input-1')) }}
                        @if($errors->has('password')&& $error_messages ==1)
                            <section class="error-box">{{ PASSWORD_REQUIRED }}</section>
                        @endif
                    </td>
                    
                </tr>
                <tr>
                    <td colspan="2" align="right">
                        <a class="pure-button pure-button-primary" href="{{ URL::route('employee.top') }}">戻る</a>
                        {{ Form::submit('確認',array('class'=>'pure-button button-error')) }}
                    </td>
                </tr>
            </tbody>
        </table>
        {{ Form::close() }}
    </section>
</section>
@include('layout.footer')
</body>
</html>
