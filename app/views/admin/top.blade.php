<!DOCTYPE html>
<html lang="ja">
@include('layout.bossheader', ['name' => '社員管理システム'])
<body>
<header>
    <nav class="home-menu pure-menu pure-menu-horizontal relative">
        <h1 class="pure-menu-heading"><a href="">社員管理システム</a></h1>
        @include('layout.admincommon', ['name' => $admin->name])
</nav>
</header>

<section class="contents">
    <h2>トップページ</h2>
        
    <nav class="pure-menu pure-menu-horizontal">
    {{$admin_detail->links()}}

{{--         <ul class="pure-menu-list">
            <li class="pure-menu-item"><a href="" class="pure-menu-link pure-button">first</a></li>
            <li class="pure-menu-item"><a href="" class="pure-menu-link pure-button">back</a></li>
            <li class="pure-menu-item">...</li>
            <li class="pure-menu-item"><a href="" class="pure-menu-link pure-button">3</a></li>
            <li class="pure-menu-item"><button class="pure-button pure-button-disabled">4</button></li>
            <li class="pure-menu-item"><a href="" class="pure-menu-link pure-button">5</a></li>
            <li class="pure-menu-item">...</li>
            <li class="pure-menu-item"><a href="" class="pure-menu-link pure-button">next</a></li>
            <li class="pure-menu-item"><a href="" class="pure-menu-link pure-button">last</a></li>
        </ul> --}}
    </nav>
    <section>
    @if(!empty($admin_detail))
        <table class="pure-table pure-table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>名前</th>
                    <th>メールアドレス</th>
                    <th>電話番号</th>
                    <th>生年月日</th>
                    <th>更新日時</th>
                    <th>権限</th>
                </tr>
            </thead>
            <tbody>
            @foreach($admin_detail as $admin)
                <tr class="pure-table-odd">
                    <?php 
                    if($admin['role_id'] == 2)
                        $permission = 'Boss';
                    else
                        $permission = 'Employee';
                    ?>
                    <td>{{$admin['id']}}</td>
                    <td><a href="">{{ $admin['name'] }}({{$permission}}）</a></td>
                    <td>{{$admin['email']}}</td>
                    <td>{{$admin['telephone_no']}}</td>
                    <td>{{$admin['birthday']}}</td>
                    <td>{{$admin['updated_at']}}</td>
                    <td> {{$permission}} </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
    </section>

    <nav class="pure-menu pure-menu-horizontal">
{{--         <ul class="pure-menu-list">
            <li class="pure-menu-item"><a href="" class="pure-menu-link pure-button">first</a></li>
            <li class="pure-menu-item"><a href="" class="pure-menu-link pure-button">back</a></li>
            <li class="pure-menu-item">...</li>
            <li class="pure-menu-item"><a href="" class="pure-menu-link pure-button">3</a></li>
            <li class="pure-menu-item"><button class="pure-button pure-button-disabled">4</button></li>
            <li class="pure-menu-item"><a href="" class="pure-menu-link pure-button">5</a></li>
            <li class="pure-menu-item">...</li>
            <li class="pure-menu-item"><a href="" class="pure-menu-link pure-button">next</a></li>
            <li class="pure-menu-item"><a href="" class="pure-menu-link pure-button">last</a></li>
        </ul> --}}
            {{$admin_detail->links()}}
    </nav>
</section>

@include('layout.footer')

</body>
</html>
