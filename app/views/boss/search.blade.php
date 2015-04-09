<!DOCTYPE html>
<html lang="ja">
@include('layout.bossheader', ['name' => '検索 | 社員管理システム'])
<body>

<header>
    <nav class="home-menu pure-menu pure-menu-horizontal relative">
        <h1 class="pure-menu-heading"><a href="">社員管理システム</a></h1>

        <ul class="pure-menu-list force-right">
            @include('layout.admincommon', ['name' => $user_own->name,'role_id' =>$user_own->id])
        </ul>
        
    </nav>
</header>
 <section>
    <?php 
        $error_box = ERROR_BOX;
        $error_messages = ERROR_MESSAGES;
    ?>
    <section class="error-box">
    @if(Session::has('message') && $error_box == 1)
        <h3>!!ERROR!!</h3>
    @endif
    @if(isset($email_error))
    {{ $email_error }}
    @endif
    @if($errors->has() && $error_box == 1)
        <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
         </ul>
    @endif
    </section>
<section class="contents">
    <h2>検索</h2>

    <section>
    @if($role_id == BOSS)
        {{Form::open(array('method'=>'GET','id'=>'form','route'=>array('boss.search_detail'),'class' => 'pure-form'))}}
    @else
        {{Form::open(array('method'=>'GET','id'=>'form','route'=>array('admin.search_detail'),'class' => 'pure-form'))}}  
    @endif    
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
                @if($user_own->role_id == ADMIN)
                <tr>
                    <td>権限</td>
                    <td colspan="3" align="center">
                        <ul class="pure-menu-list pure-menu-horizontal">
                            <li class="pure-menu-item pure-u-1-6"><label for="admin"><input type="checkbox" id="admin" name="admin" value="{{ADMIN}}">管理者</label></li>
                            <li class="pure-menu-item pure-u-1-6"><label for="boss"><input type="checkbox" id="boss" name="boss" value="{{BOSS}}">BOSS</label></li>
                            <li class="pure-menu-item pure-u-1-6"><label for="employee"><input type="checkbox" id="employee" name="employee" value="{{EMPLOY}}">従業員</label></li>
                        </ul>
                    </td>
                </tr>
                @endif
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
