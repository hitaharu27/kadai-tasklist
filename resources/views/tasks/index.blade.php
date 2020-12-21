@extends('layouts.app')

@section('content')

    <h1>タスク一覧</h1>

    @if (count($tasks) > 0)
        <table class="table table-striped">
            <thead>
                <tr class="row">
                    <th class="col-sm-1">完了</th>
                    <th class="col-sm-8">タスク名</th>
                    <th class="col-sm-3">期限</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tasks as $task)
                <tr class="row">
                    <td class="col-sm-1">{!! Form::model($task, ['route' => ['tasks.destroy', $task->id], 'method' => 'delete']) !!}
                            <button type="submit">　</button>
                        {!! Form::close() !!}</td>
                    <td class="col-sm-8">{!! link_to_route('tasks.show', $task->title, ['task' => $task->id]) !!}</td>
                    <td class="col-sm-3">{{ $task->limit }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    {{-- タスク作成ページへのリンク --}}
    {!! link_to_route('tasks.create', '新規タスクの投稿', [], ['class' => 'btn btn-primary']) !!}

@endsection