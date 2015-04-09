<!DOCTYPE html>
<html lang="ja">
@include('layout.bossheader', ['name' => '検索 | 社員管理システム'])
<body>

<header>
    <nav class="home-menu pure-menu pure-menu-horizontal relative">
        <h1 class="pure-menu-heading"><a href="">社員管理システム</a></h1>

        <ul class="pure-menu-list force-right">
            @include('layout.bosscommon', ['name' => '飯塚 浩二（管理者）'])
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
