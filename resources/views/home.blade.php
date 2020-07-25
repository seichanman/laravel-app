@extends('layouts.app')

@section('content')
<div class="container">
    <div class="mx-auto col-md-6">
        <nav class="pageBlock pageBlock__content">
            <h2 class="text-center">
            まずはフォルダを作成しましょう
            </h2>
            <div class="pageBlock__addBtn">
                <a href="{{ route('folders.create') }}" class="btn btn-primary">
                フォルダ作成ページへ
                </a>
            </div>
        </nav>
    </div>
</div>
@endsection
