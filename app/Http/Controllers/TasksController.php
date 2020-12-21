<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Task;   
use App\User;   

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function index()
    {
        if (\Auth::check()) {
        // タスク一覧を取得
        
        $user = \Auth::user();
        $tasks =  $user->tasks()->get();

        // タスク一覧ビューでそれを表示
        return view('tasks.index', [
            'tasks' => $tasks,
        ]);
        }
        
        return view('welcome');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $task = new Task;

        return view('tasks.create', [
            'task' => $task,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:10',   // 追加
            'limit' => 'required|max:10',
        ]);

        $request->user()->tasks()->create([
            'title' => $request->title,
            'limit' => $request->limit,
        ]);


        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   public function show($id)
    {
        $task = Task::findOrFail($id);
        $user = \Auth::user();
        
        if($task->user_id == $user->id) {
            return view('tasks.show', [
            'task' => $task,
            ]);
        } else {
            return redirect('/');
        }
       
        
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // idの値でタスクを検索して取得
        $task = Task::findOrFail($id);
        $user = \Auth::user();

        // タスク編集ビューでそれを表示
        if($task->user_id == $user->id) {
        return view('tasks.edit', [
            'task' => $task,
        ]);
        } else {
            return redirect('/');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   public function update(Request $request, $id)
    {
        // バリデーション
        $request->validate([
            'title' => 'required|max:10',   // 追加
            'limit' => 'required|max:10',
        ]);

        // idの値でタスクを検索して取得
        $task = Task::findOrFail($id);
        // タスクを更新
        $task->title = $request->title;    // 追加
        $task->limit = $request->limit;
        $task->save();

        // トップページへリダイレクトさせる
        return redirect('/');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function destroy($id)
    {
        // idの値でタスクを検索して取得
        $task = Task::findOrFail($id);
        // タスクを削除
        $task->delete();

        // トップページへリダイレクトさせる
        return redirect('/');
    }
}
