@extends('layouts.app')
@push('css')
    <link href="{{ asset('css/scroll-hint.css') }}" rel="stylesheet">
@endpush
@section('content')
<div class="container">
    <div class="row justify-content-between">
        <div class="col-md-4">
            <nav class="pageBlock">
                <h2 class="pageBlock__ttl">フォルダ</h2>
                <div class="pageBlock__addBtn">
                    <a href="{{ route('folders.create') }}">フォルダを追加する</a>
                </div>
                <div>
                    @foreach($folders as $folder)
                    <a href="{{ route('tasks.index', ['id' => $folder->id]) }}" class="pageBlock__item  {{ $current_folder_id === $folder->id ? 'active' : '' }}">
                        {{ $folder->title }}
                    </a>
                    @endforeach
                </div>
            </nav>
        </div>
        <div class="col-md-8 mt-5 mt-md-0">
            <div class="pageBlock">
                <h2 class="pageBlock__ttl">タスク</h2>
                <div class="pageBlock__addBtn">
                    <a href="{{ route('tasks.create',['id' => $current_folder_id]) }}" class="">タスクを追加する</a>
                </div>
                <div class="js-scrollable">
                    <table class="pageBlock__table">
                        <thead>
                            <tr>
                                <th>タイトル</th>
                                <th>状態</th>
                                <th>期限</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($tasks as $task)
                            <tr>
                                <td>{{ $task->title }}</td>
                                <td>
                                    <span class="pageBlock__table-label {{ $task->status_class }}">{{ $task->status_label }}</span>
                                </td>
                                <td>{{ $task->due_date }}</td>
                                <td><a href="{{ route('tasks.edit', ['id' => $task->folder_id, 'task_id' => $task->id]) }}">編集</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('js')
<script src="{{ asset('js/scroll-hint.min.js') }}" defer></script>
<script>
window.addEventListener("DOMContentLoaded", function () {
  new ScrollHint(".js-scrollable", {
    scrollHintIconAppendClass: "scroll-hint-icon-white", // white-icon will appear
    i18n: {
      scrollable: "スクロールできます",
    },
  });
});
</script>
@endpush