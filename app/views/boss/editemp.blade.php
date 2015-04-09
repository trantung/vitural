<!DOCTYPE html>
<html lang="ja">
@include('layout.bossheader', ['name' => '>編集 | 社員管理システム'])
<body>

<header>
    <nav class="home-menu pure-menu pure-menu-horizontal relative">
        <h1 class="pure-menu-heading"><a href="">社員管理システム</a></h1>
        @include('layout.bosscommon', ['name' => '岸 由一郎'])

</header>
<section class="contents">
    <h2>編集</h2>
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
                    <td><textarea name="note" class="pure-input-1">@if(isset($comment)) {{$comment->content}} @endif</textarea></td>
                </tr>
                <tr>
                    <th>パスワード</th>
                    <td>{{Form::text('password','', array('class'=>'pure-input-1'))}}</td>
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
