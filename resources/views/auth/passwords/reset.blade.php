@extends('layouts.app')

@section('content')
<div class="container">
    <div class="signinPage">
        <div class="signinPage__inner">
            <div class="signinPage__ttlBox">
                <h2 class="signinPage__ttlBox-ttl">パスワード再発行</h2>
            </div>
            <form class="signinForm" action="{{ route('password.update') }}" method="POST">
                @csrf
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <dl class="signinForm__group">
                    <dt class="signinForm__group-ttl">
                        <label for="email">メールアドレス</label>
                    </dt>
                    <dd class="signinForm__group-content">
                        <input type="text" class="form-control" id="email" name="email" value="{{ old('email', $email) }}"/>
                    </dd>
                </dl>

                <dl class="signinForm__group">
                    <dt class="signinForm__group-ttl">
                        <label for="password">新しいパスワード</label>
                    </dt>
                    <dd class="signinForm__group-content">
                        <input type="password" class="form-control" id="password" name="password" />
                    </dd>
                </dl>

                <dl class="signinForm__group">
                    <dt class="signinForm__group-ttl">
                        <label for="password-confirm">新しいパスワード（確認）</label>
                    </dt>
                    <dd class="signinForm__group-content">
                        <input type="password" class="form-control" id="password-confirm" name="password_confirmation" />
                    </dd>
                </dl>

                <div class="signinForm__btn">
                    <button type="submit">送信</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
