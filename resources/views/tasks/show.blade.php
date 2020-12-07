@extends('layouts.app')

@section('content')

    <h1>id = {{ $task->id }} のタスク詳細ページ</h1>

    <table class="table table-bordered">
        <tr>
            <th>id</th>
            <td>{{ $task->id }}</td>
        </tr>
        <tr>
            <th>タイトル</th>
                <td>{{ $task->title }}</td>
        </tr>
        <tr>
            <th>ステータス</th>
            <td>{{ $task->content }}</td>
        </tr>
    </table>

    {{-- ステータス編集ページへのリンク --}}
    {!! link_to_route('tasks.edit', 'このステータスを編集', ['task' => $task->id], ['class' => 'btn btn-light']) !!}

    {{-- ステータス削除フォーム --}}
    {!! Form::model($task, ['route' => ['tasks.destroy', $task->id], 'method' => 'delete']) !!}
        {!! Form::submit('削除', ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
    
@endsection