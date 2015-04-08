@include('layout/header')

<section class="contents">
    <h2>ログイン</h2>

    <section>
        <form class="pure-form">
            <fieldset class="pure-group">
                <input type="text" name="email" class="pure-input-1-4 required" placeholder="メールアドレス">
                <input type="text" name="password" class="pure-input-1-4 required" placeholder="パスワード">
            </fieldset>
            <button type="submit" class="pure-button pure-input-1-4 pure-button-primary">ログイン</button>
        </form>
    </section>
</section>
@include('layout/footer')
