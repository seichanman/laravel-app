@extends('layouts.app')

@section('content')
<div class="container">
    <div class="signinPage">
        <div class="signinPage__inner">
            <div class="signinPage__ttlBox">
                <h2 class="signinPage__ttlBox-ttl">Task Appにログイン</h2>
                <p class="text-center m-3">or</p>
                <p class="signinPage__ttlBox-acountLink">
                    <a href="{{ route('register') }}">アカウントを作成</a>
                </p>
            </div>
            <form class="signinForm" id="new_user" action="{{ route('login') }}" accept-charset="UTF-8" method="post">
                @csrf
                <dl class="signinForm__group">
                    <dt class="signinForm__group-ttl">
                        <label for="email">メールアドレス</label>
                    </dt>
                    <dd class="signinForm__group-content">
                        <input id="email" type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </dd>
                </dl>
                <dl class="signinForm__group">
                    <dt class="signinForm__group-ttl">
                        <label for="user_password">パスワード</label>
                    </dt>
                    <dd class="signinForm__group-content">
                        <input id="password" type="password" name="password" required>
                        @if ($errors->has('password'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                        @endif
                    </dd>
                </dl>
                <div class="signinForm__btn">
                    <input type="submit" name="commit" value="ログインする" data-disable-with="ログインする">
                </div>
            </form>
            <!--
            <div class="signinPage__ttlBox-acountLink text-center">
            <a href="{{ route('password.request') }}">パスワードの変更はこちらから</a>
            </div>
            -->
        </div>
    </div>
</div>

@endsection