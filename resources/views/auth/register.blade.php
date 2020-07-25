@extends('layouts.app')

@section('content')
<div class="container">
    <div class="signinPage">
        <div class="signinPage__inner">
            <div class="signinPage__ttlBox">
                <h2 class="signinPage__ttlBox-ttl">アカウントを新規作成</h2>
                <p class="text-center m-3">or</p>
                <p class="signinPage__ttlBox-acountLink">
                <a href="{{ route('login') }}">アカウントにサインイン</a>
                </p>
            </div>
            <form class="signinForm" id="new_user" action="{{ route('register') }}" accept-charset="UTF-8" method="post">
            @csrf
                <dl class="signinForm__group">
                    <dt class="signinForm__group-ttl">
                        <label for="user_name">お名前</label>
                    </dt>
                    <dd class="signinForm__group-content">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </dd>
                </dl>

                <dl class="signinForm__group">
                    <dt class="signinForm__group-ttl">
                        <label for="user_email">メールアドレス</label>
                    </dt>
                    <dd class="signinForm__group-content">
                        <input id="email" type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
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
                        <em>(6文字以上入力してください)</em>
                    </dt>
                    <dd class="signinForm__group-content">
                        <input placeholder="パスワードを入力してください" autocomplete="off" type="password" name="password" required>
                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </dd>
                </dl>

                <dl class="signinForm__group">
                    <dt class="signinForm__group-ttl">
                        <label for="user_password_confirmation">パスワード確認</label>
                    </dt>
                    <dd class="signinForm__group-content">
                        <input placeholder="パスワードを再度入力してください" autocomplete="off" type="password" name="password_confirmation" required>
                    </dd>
                </dl>

                <div class="signinForm__btn">
                    <input type="submit" name="commit" value="アカウントを作成"  data-disable-with="アカウントを作成">
                </div>

            </form>
        </div>
    </div>
</div>




</div>
@endsection