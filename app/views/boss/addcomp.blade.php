<!DOCTYPE html>
<html lang="ja">
    @include('layout.bossheader', ['name' => '追加（完了） | 社員管理システム'])
<body>

<header>
    <nav class="home-menu pure-menu pure-menu-horizontal relative">
        <h1 class="pure-menu-heading"><a href="">社員管理システム</a></h1>
        @include('layout.bosscommon', ['name' => $name])
    </nav>
</header>

<section class="contents">
    <h2>追加（完了）</h2>

    <section>
        <p>
            ID：<a href="{{URL::route('employee.detail',$user_id)}}">{{$user_id}}</a>として追加しました。
        </p>
        <div>
            <a class="pure-button pure-button-primary" href="">検索画面へ</a>
        </div>
    </section>
</section>

@include('layout.footer')

</body>
</html>
