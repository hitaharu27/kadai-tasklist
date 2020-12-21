@extends('layouts.app')

@section('content')

    <h1>タスク詳細ページ</h1>

    <table class="table table-bordered">
        <tr>
            <th>タスク名</th>
                <td>{{ $task->title }}</td>
        </tr>
        <tr>
            <th>期限</th>
            <td>{{ $task->limit }}</td>
        </tr>
    </table>

    {!! link_to_route('tasks.edit', 'このステータスを編集', ['task' => $task->id], ['class' => 'btn btn-light']) !!}

    {!! Form::model($task, ['route' => ['tasks.destroy', $task->id], 'method' => 'delete']) !!}
        {!! Form::submit('削除', ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
    
@endsection