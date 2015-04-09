<!DOCTYPE html>
<html lang="ja">
@include('layout.bossheader', ['name' => '削除（確認） | 社員管理システム'])
<body>

<header>
    <nav class="home-menu pure-menu pure-menu-horizontal relative">
        <h1 class="pure-menu-heading"><a href="">社員管理システム</a></h1>
        @include('layout.bosscommon', ['name' => '岸 由一郎'])
    </nav>
</header>

<section class="contents">
    <h2>削除（確認）</h2>

    <section>
        <p>
            次のデータを削除します。
        </p>
        <table class="pure-table pure-table-bordered" width="100%">
        {{Form::open(array('id'=>'form','route'=>array('employee.deleteconf','id'=>$user_detail->id),'class' => 'pure-form pure-u-3-4'))}}

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
                    <th>ノート</th>
                    <td>{{$comment}}
                    </td>
                </tr>
                <tr>
                    <td colspan="2" align="right">
                        <a class="pure-button pure-button-primary" href="{{URL::route('employee.detail',$user_detail->id)}}">戻る</a>
                        <button class="pure-button button-error" name="submit" type="submit">実行</button>
                    </td>
                </tr>
            </tbody>
         {{Form::close()}}

        </table>
    </section>
</section>

@include('layout.footer')
</body>
</html>
