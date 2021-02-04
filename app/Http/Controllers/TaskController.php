<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Task;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;

class TaskController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|Response
     */
    public function create()
    {
        return view('task.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreTaskRequest $request
     * @return RedirectResponse
     */
    public function store(StoreTaskRequest $request)
    {
        $request->validated();
        $task = Task::create(
            [
                'name' => $request->name,
                'todo_id' => $request->todo_id
            ]
        );

        return redirect()->route('todo.show', ['todo' => $request->todo_id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Task $task
     * @return Application|Factory|View|Response
     */
    public function edit(Task $task)
    {
        return view('task.edit', ['task' => $task]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateTaskRequest $request
     * @param Task $task
     * @return RedirectResponse
     */
    public function update(UpdateTaskRequest $request, Task $task)
    {
        $request->validated();
        $task->update(
            [
                'name' => $request->name,
                'is_completed' => $request->is_completed,
                'deadline' => $request->deadline
            ]
        );

        return redirect()->route('todo.show', ['todo' => $task->todo_id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Task $task
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('todo.show', ['todo' => $task->todo_id]);
    }
}
