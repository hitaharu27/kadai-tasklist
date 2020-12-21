@extends('layouts.app')

@section('content')

    <h1>タスク新規作成ページ</h1>

    <div class="row">
        <div class="col-6">
           {!! Form::model($task, ['route' => 'tasks.store']) !!}

                <div class="form-group">
                    {!! Form::label('title', 'タスク名:') !!}
                    {!! Form::text('title', null, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('limit', '期限:') !!}
                    {!! Form::date('limit', \Carbon\Carbon::now()); !!}
                </div>

                {!! Form::submit('投稿', ['class' => 'btn btn-primary']) !!}

            {!! Form::close() !!}
        </div>
    </div>
@endsection