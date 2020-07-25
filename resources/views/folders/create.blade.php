@extends('layouts.app')

@section('content')
<div class="container">
    <div class="mx-auto col-md-8">
        <nav class="pageBlock">
            <h2 class="pageBlock__ttl">フォルダを追加する</h2>
            <div class="pageBlock__content">
                <form action="{{ route('folders.create') }}" method="post">
                @csrf
                    <dl class="pageBlock-form">
                        <dt class="pageBlock-form__ttl">
                            <label for="title">フォルダ名</label>
                        </dt>
                        <dd class="pageBlock-form__content">
                            <input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}" />
                            @if($errors->any())
                                @foreach($errors->all() as $message)
                                <p class="pageBlock-form__content-error">{{ $message }}</p>
                                @endforeach
                            @endif
                        </dd>
                    </dl>
                    <div class="pageBlock-form__btn">
                        <button type="submit">追加</button>
                    </div>
                </form>
            </div>
        </nav>
    </div>
</div>
@endsection
