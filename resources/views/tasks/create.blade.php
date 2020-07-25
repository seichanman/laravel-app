@extends('layouts.app')
@push('css')
    <link href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css" rel="stylesheet">
    <link href="https://npmcdn.com/flatpickr/dist/themes/material_blue.css" rel="stylesheet">
@endpush
@section('content')
<div class="container">
    <div class="mx-auto col-md-8">
        <nav class="pageBlock">
            <h2 class="pageBlock__ttl">タスクを追加する</h2>
            <div class="pageBlock__content">
                @if($errors->any())
                    <div class="alert alert-danger">
                    @foreach($errors->all() as $message)
                        <p>{{ $message }}</p>
                    @endforeach
                    </div>
                @endif
                <form action="{{ route('tasks.create', ['id' => $folder_id]) }}" method="POST">
                    @csrf
                    <dl class="pageBlock-form">
                        <dt class="pageBlock-form__ttl">
                            <label for="title">タイトル</label>
                        </dt>
                        <dd class="pageBlock-form__content">
                            <input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}" />
                        </dd>
                    </dl>

                    <dl class="pageBlock-form">
                        <dt class="pageBlock-form__ttl">
                            <label for="due_date">期限</label>
                        </dt>
                        <dd class="pageBlock-form__content">
                            <input type="text" class="form-control" name="due_date" id="due_date" value="{{ old('due_date') }}" />
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
@push('js')
    <script src="https://npmcdn.com/flatpickr/dist/flatpickr.min.js"></script>
    <script src="https://npmcdn.com/flatpickr/dist/l10n/ja.js"></script>
    <script>
    flatpickr(document.getElementById('due_date'), {
        locale: 'ja',
        dateFormat: "Y/m/d",
        minDate: new Date()
    });
    </script>
@endpush