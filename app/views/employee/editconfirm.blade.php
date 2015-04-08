<html lang="ja">
<head>
    <meta content="" name="description">
    <title>編集（確認） | 社員管理システム</title>
    <link href="/" rel="canonical">
    {{ HTML::style('asset/css/pure-min.css') }}
    {{ HTML::style('asset/css/custom.css') }}
</head>
<body>

<header>
    <nav class="home-menu pure-menu pure-menu-horizontal relative">
        <h1 class="pure-menu-heading"><a href="">社員管理システム</a></h1>
        <ul class="pure-menu-list force-right">
            <li class="pure-menu-item"><span class="pure-menu-link">{{$input['name']}}</span></li>
            <li class="pure-menu-item"><a href="{{ URL::route('logout') }}" class="pure-menu-link">ログアウト</a></li>
        </ul>
    </nav>
</header>

<section class="contents">
    <h2>編集（確認）</h2>

    <section>
        {{Form::open(array('id'=>'form','route'=>array('employee.comp','id'=>$id),'class' => 'pure-form pure-u-3-4'))}}
        <table class="pure-table pure-table-bordered" width="100%">
        {{-- {{dd($input)}} --}}
            <tbody>
                <tr>
                    <th>ID</th>
                    <td>{{$id}}</td>
                </tr>
                <tr>
                    <th>名前</th>
                    <td>{{$input['name']}}</td>
                </tr>
                <tr>
                    <th>名前（カナ）</th>
                    <td>{{$input['kana']}}</td>
                </tr>
                <tr>
                    <th>電話番号</th>
                    <td>{{$input['telephone_no']}}</td>
                </tr>
                <tr>
                    <th>生年月日</th>
                    <td>{{$input['birthday']}}</td>
                </tr>
                <tr>
                    <td colspan="2" align="right">
                       
                        <a class="pure-button pure-button-primary" href="{{ URL::route('employee.edit',$id) }}">戻る</a>
                        {{ Form::submit('更新',array('class'=>'pure-button button-error')) }}
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
