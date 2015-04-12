<!DOCTYPE html>
<html lang="ja">
@include('layout.bossheader', ['name' => '社員管理システム'])
<body>
<header>
    <nav class="home-menu pure-menu pure-menu-horizontal relative">
        <h1 class="pure-menu-heading"><a href="">社員管理システム</a></h1>
        @include('layout.admincommon', ['name' => $user_own->name,'role_id' =>$user_own->id])
</nav>
</header>
    {{ HTML::style('asset/css/lis.css') }}

<section class="contents">
    <h2>トップページ</h2>
        
    <nav class="pure-menu pure-menu-horizontal">

        <ul class="pure-menu-list">
            {{ with(new Paginate($list_users))->render() }}
        </ul> 
    </nav>
    <section>
    @if(!empty($list_users))
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
                
            @foreach($list_users as $key =>$admin)
                <?php
                    if($key%2 == 0){
                        $class = 'pure-table-odd';
                    }
                    else{
                        $class = '';
                    }
                ?>
                <tr class="{{$class}}">
                    <?php 
                    if($admin['role_id'] == 2)
                        $permission = BOSS_PERMISSION;
                    else
                        $permission = EMPLOY_PERMISSION;
                    ?>
                    <td>{{$admin['id']}}</td>
                    <td><a href="{{URL::route('employee.detail',$admin['id'])}}">{{ $admin['name'] }}({{$permission}}）</a></td>
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
        <ul class="pure-menu-list">
            <ul class="pagination ">
                {{ with(new Paginate($list_users))->render() }}
            </ul>
        </ul> 
    </nav>
</section>

@include('layout.footer')

</body>
</html>
