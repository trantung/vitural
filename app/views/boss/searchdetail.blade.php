<!DOCTYPE html>
<html lang="ja">
@include('layout.bossheader', ['name' => '検索 | 社員管理システム'])
<body>

<header>
    <nav class="home-menu pure-menu pure-menu-horizontal relative">
        <h1 class="pure-menu-heading"><a href="">社員管理システム</a></h1>
        
           @include('layout.admincommon', ['name' => $user_own->name,'role_id' =>$user_own->id])

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
                    <input type="text" name="start_date" value="" placeholder="開始日">
                        &nbsp;～&nbsp;
                        <input type="text" name="end_date" value="" placeholder="終了日">
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
    @if(!empty($list_users))
    <nav class="pure-menu pure-menu-horizontal">
        {{$list_users->links()}}
       <!--  <ul class="pure-menu-list">
            <li class="pure-menu-item"><a href="" class="pure-menu-link pure-button">first</a></li>
            <li class="pure-menu-item"><a href="" class="pure-menu-link pure-button">back</a></li>
            <li class="pure-menu-item">...</li>
            <li class="pure-menu-item"><a href="" class="pure-menu-link pure-button">3</a></li>
            <li class="pure-menu-item"><button class="pure-button pure-button-disabled">4</button></li>
            <li class="pure-menu-item"><a href="" class="pure-menu-link pure-button">5</a></li>
            <li class="pure-menu-item">...</li>
            <li class="pure-menu-item"><a href="" class="pure-menu-link pure-button">next</a></li>
            <li class="pure-menu-item"><a href="" class="pure-menu-link pure-button">last</a></li>
        </ul> -->
    </nav>
    <section>
        <table class="pure-table pure-table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>名前</th>
                    <th>メールアドレス</th>
                    <th>電話番号</th>
                    <th>生年月日</th>
                    <th>更新日時</th>
                </tr>
            </thead>
            <tbody>
            @foreach($list_users as $key=>$search_list)
                <?php
                    if($key%2 == 0){
                        $class = 'pure-table-odd';
                    }
                    else{
                        $class = '';
                    }
                ?>
                <tr class="{{$class}}">
                    <td>{{$search_list->id}}</td>
                    <td><a href="{{ URL::route('employee.detail',$search_list->id) }}">{{$search_list->name}}</a></td>
                    <td>{{$search_list->email}}</td>
                    <td>{{$search_list->telephone_no}}</td>
                    <td>{{$search_list->birthday}}</td>
                    <td>{{$search_list->updated_at}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </section>
    <nav class="pure-menu pure-menu-horizontal">
        {{$list_users->links()}}
        <!-- <ul class="pure-menu-list">
            <li class="pure-menu-item"><a href="" class="pure-menu-link pure-button">first</a></li>
            <li class="pure-menu-item"><a href="" class="pure-menu-link pure-button">back</a></li>
            <li class="pure-menu-item">...</li>
            <li class="pure-menu-item"><a href="" class="pure-menu-link pure-button">3</a></li>
            <li class="pure-menu-item"><button class="pure-button pure-button-disabled">4</button></li>
            <li class="pure-menu-item"><a href="" class="pure-menu-link pure-button">5</a></li>
            <li class="pure-menu-item">...</li>
            <li class="pure-menu-item"><a href="" class="pure-menu-link pure-button">next</a></li>
            <li class="pure-menu-item"><a href="" class="pure-menu-link pure-button">last</a></li>
        </ul> -->
    </nav>
    @else
        <section class="error-box">{{ NO_RESULT_SEARCH }}</section>
    @endif

</section>

<footer>
Employer Management System
</footer>

</body>
</html>
