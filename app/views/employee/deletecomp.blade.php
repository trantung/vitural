<!DOCTYPE html>
<html lang="ja">
@include('layout.bossheader', ['name' => '削除（完了） | 社員管理システム'])
<body>

<header>
    <nav class="home-menu pure-menu pure-menu-horizontal relative">
        <h1 class="pure-menu-heading"><a href="">社員管理システム</a></h1>
        @include('layout.bosscommon', ['name' => '岸 由一郎'])
    </nav>
</header>

<section class="contents">
    <h2>削除（完了）</h2>

    <section>
        <p>
            削除しました。
        </p>
        <div>
            <a class="pure-button pure-button-primary" href="{ URL::route('boss.search') }}">検索画面へ</a>
        </div>
    </section>
</section>

@include('layout.footer')

</body>
</html>
