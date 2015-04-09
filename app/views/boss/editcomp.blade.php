<!DOCTYPE html>
<html lang="ja">
@include('layout.bossheader', ['name' => '編集（完了） | 社員管理システム'])
<body>
<header>
	<nav class="home-menu pure-menu pure-menu-horizontal relative">
		<h1 class="pure-menu-heading"><a href="">社員管理システム</a></h1>
			 @include('layout.bosscommon', ['name' => '飯塚 浩二（管理者）'])
	</nav>
</header>

<section class="contents">
	<h2>編集（完了）</h2>

	<section>
		<p>
			ID：<a href="">{{$id}}</a>を更新しました。
		</p>
		<div>
			<a class="pure-button pure-button-primary" href="{{URL::route('boss.search')}}">検索画面へ</a>
		</div>
	</section>
</section>

@include('layout.footer')

</body>
</html>
