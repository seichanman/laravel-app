@extends('layouts.app')

@section('content')
<div class="container">
    <div class="signinPage">
        <div class="signinPage__inner">
            <div class="signinPage__ttlBox">
                <h2 class="signinPage__ttlBox-ttl">パスワード再発行</h2>
            </div>
            @if (session('status'))
              <div class="alert alert-success mt-5" role="alert">
                {{ session('status') }}
              </div>
            @endif
            <form class="signinForm" action="{{ route('password.email') }}" method="POST">
                @csrf
                <dl class="signinForm__group">
                    <dt class="signinForm__group-ttl">
                      <label for="email">メールアドレス</label>
                    </dt>
                    <dd class="signinForm__group-content">
                      <input type="text" class="form-control" id="email" name="email" />
                    </dd>
                </dl>
                <div class="signinForm__btn">
                    <button type="submit">再発行リンクを送る</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection