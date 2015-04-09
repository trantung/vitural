<!DOCTYPE html>
<html lang="ja">
    @include('layout.bossheader', ['name' => '追加（確認） | 社員管理システム'])
<body>

<header>
    <nav class="home-menu pure-menu pure-menu-horizontal relative">
        <h1 class="pure-menu-heading"><a href="">社員管理システム</a></h1>
        @include('layout.bosscommon', ['name' => '岸 由一郎'])
    </nav>
</header>

<section class="contents">
    <h2>追加（確認）</h2>

    <section>
        {{Form::open(array('id'=>'form','route'=>array('boss.addcomp'),'class' => 'pure-form pure-u-3-4'))}}
        @foreach($input as $key=>$value)
            {{ Form::hidden($key, $value) }}
        @endforeach
        <table class="pure-table pure-table-bordered" width="100%">
            <tbody>
                <tr>
                    <th>名前</th>
                    <td>{{$input['name']}}</td>
                </tr>
                <tr>
                    <th>名前（カナ）</th>
                    <td>{{$input['kana']}}</td>
                </tr>
                <tr>
                    <th>メールアドレス</th>
                    <td>{{$input['email']}}</td>
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
                    <th>ノート</th>
                    <td>{{$input['note']}}
                    </td>
                </tr>
                <tr>
                    <th>権限</th>
                    <td>
                    @if(isset($input['roll']))
                        @if($input['roll'] == 2)
                            {{BOSS_PERMISSION}}
                        @elseif($input['roll'] == 1)
                            {{ADMIN_PERMISSION}}
                        @else
                            {{EMPLOY_PERMISSION}}
                        @endif
                    @else
                        {{従業員}}
                    @endif
                    </td>
                </tr>
                <tr>
                    <th>BOSS</th>
                    <td>
                    @if(isset($input['roll_boss']))
                        {{\User::find($input['roll_boss'])->name}}
                    @endif
                    </td>
                </tr>
                <tr>
                    <td colspan="2" align="right">
                    <a class="pure-button pure-button-primary" href="{{ URL::route('boss.add') }}">戻る</a>
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
