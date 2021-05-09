<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Folder;
use App\Models\Status;
use Illuminate\Http\Request;
use App\Http\Requests\Tasks as TaskRequest;
use App\Http\Requests\Tasks\EditTaskRequest;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($currentFolderId)
    {
        return view('tasks.index', [
            'folders' => Folder::all(),
            'currentFolderId' => (int)$currentFolderId,
            'tasks' => Task::all(),
            'existsTask' => Task::where('folder_id', $currentFolderId)->exists(),
            'existsFolder' => Folder::where('id', $currentFolderId)->exists(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($folderId)
    {
        return view('tasks.create', [
            'folderId' => $folderId,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\Tasks\CreateTaskRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TaskRequest\CreateTaskRequest $request, int $folderId, Task $task)
    {
        $task->fill($request->all());

        Folder::find($folderId)->tasks()->save($task);

        return redirect()->route('tasks.index', [
            'id' => $folderId,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task, $folderId, $id)
    {
        return view('tasks.edit', [
            'task' => $task::find($id),
            'statuses' => Status::all(),
            'folderId' => $folderId,
            'id' => $id,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\Tasks\EditTaskRequest  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(EditTaskRequest $request, Task $task, int $folderId, int $id)
    {
        $task->find($id)->fill($request->all())->save();

        return redirect()->route('tasks.index', [
            'id' => $folderId,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $folderId, int $id, Task $task)
    {
        $task->destroy($id);

        return redirect()->route('tasks.index', [
            'id' => $folderId,
        ]);
    }
}
