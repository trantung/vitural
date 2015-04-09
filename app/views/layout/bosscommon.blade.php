<ul class="pure-menu-list force-right">
<li class="pure-menu-item"><span class="pure-menu-link">{{$name}}</span></li>
<li class="pure-menu-item"><a href="{{ URL::route('boss.search') }}" class="pure-menu-link">検索</a></li>
<li class="pure-menu-item"><a href="{{ URL::route('boss.add') }}" class="pure-menu-link">追加</a></li>
<li class="pure-menu-item"><a href="{{ URL::route('logout') }}" class="pure-menu-link">ログアウト</a></li>
</ul>