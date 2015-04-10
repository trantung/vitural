<!DOCTYPE html>
<html lang="ja">
@include('layout.bossheader', ['name' => '>編集 | 社員管理システム'])
<body>

<header>
    <nav class="home-menu pure-menu pure-menu-horizontal relative">
        <h1 class="pure-menu-heading"><a href="">社員管理システム</a></h1>
        @include('layout.bosscommon', ['name' => $name)

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
                   @if($errors->has('name') && $error_messages ==1)
                       <section class="error-box">{{$errors->first('name')}}</section>
                    @endif
                    </td>
                </tr>
                <tr>
                    <th>名前（カナ）</th>
                    <td>{{Form::text('kana',$user_detail->kana, array('class'=>'pure-input-1'))}}
                    @if($errors->has('kana') && $error_messages ==1)
                       <section class="error-box">{{$errors->first('kana')}}</section>
                    @endif
                    </td>
                </tr>
                <tr>
                    <th>メールアドレス</th>
                    <td>{{Form::text('email',$user_detail->email, array('class'=>'pure-input-1'))}}
                    @if($errors->has('email') && $error_messages ==1)
                       <section class="error-box">{{$errors->first('email')}}</section>
                    @endif
                    </td>
                </tr>
                <tr>
                    <th>メールアドレス（確認）</th>
                    <td>{{Form::text('email_conf',$user_detail->email, array('class'=>'pure-input-1'))}}
                    @if($errors->has('email_conf') && $error_messages ==1)
                       <section class="error-box">{{$errors->first('email_conf')}}</section>
                    @endif
                    </td>
                </tr>
                <tr>
                    <th>電話番号</th>
                    <td>{{Form::text('telephone_no',$user_detail->telephone_no, array('class'=>'pure-input-1'))}}
                    @if($errors->has('telephone_no') && $error_messages ==1)
                       <section class="error-box">{{$errors->first('telephone_no')}}</section>
                    @endif
                    </td>
                </tr>
                <tr>
                    <th>生年月日</th>
                    <td>{{Form::text('birthday',$user_detail->birthday, array('class'=>'pure-input-1'))}}
                    @if($errors->has('birthday') && $error_messages ==1)
                       <section class="error-box">{{$errors->first('birthday')}}</section>
                    @endif
                    </td>
                </tr>
                <tr>
                    <th>ノート</th>
                    <td>
                    <textarea name="note" class="pure-input-1">
                        @if(isset($comment)) {{$comment->content}} @endif</textarea>
                        @if($errors->has('note') && $error_messages ==1)
                       <section class="error-box">{{$errors->first('note')}}</section>
                        @endif
                    </td>
                </tr>
                <tr>
                    <th>パスワード</th>
                    <td><input type="password" name="password" class="pure-input-1">
                    @if($errors->has('password') && $error_messages ==1)
                       <section class="error-box">{{$errors->first('password')}}</section>
                    @endif
                    </td>
                </tr>
                @if($role_id == ADMIN)
                <tr>
                    <th>権限</th>
                    <td>
                        <select name="roll" class="pure-input-1">
                            <option value="3">従業員</option>
                            <option value="2">BOSS</option>
                            <option value="1">管理者</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th>BOSS</th>
                    <td>
                        <select name="roll_boss" class="pure-input-1">
                            <option value="">--</option>
                            @foreach($list_boss as $boss)
                            <option value="{{$boss->id}}">{{$boss->name}}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                @endif
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
