@extends('layout.master')
@section('content')
<section class="contents">
    <h2>ログイン</h2>
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

     {{ Form::open(array('id'=>'form','route'=>'vitural.postlogin','class' => 'pure-form')) }}
            <fieldset class="pure-group">
            <input type="text" name="email" class="pure-input-1-4 required" placeholder="メールアドレス">
            @if($errors->has('email') && $error_messages ==1)
               <section class="error-box">{{ EMAIL_REQUIRED }}</section>
            @endif
            <input type="password" name="password" class="pure-input-1-4 required" placeholder="パスワード">
            @if($errors->has('password')&& $error_messages ==1)
                <section class="error-box">{{ PASSWORD_REQUIRED }}</section>
            @endif
            </fieldset>
            {{ Form::submit('ログイン',array('class'=>'pure-button pure-input-1-4 pure-button-primary')) }}
        {{ Form::close() }}
    </section>
</section>
@stop


