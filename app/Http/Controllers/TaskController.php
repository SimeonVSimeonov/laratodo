<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Task;
use App\Repositories\TaskRepository;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;

class TaskController extends Controller
{
    /**
     * @var TaskRepository
     */
    private $taskRepository;

    /**
     * TaskController constructor.
     * @param TaskRepository $taskRepository
     */
    public function __construct(TaskRepository $taskRepository)
    {
        $this->middleware('auth');
        $this->taskRepository = $taskRepository;
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
        $this->taskRepository->createTask($request);
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
        $this->taskRepository->updateTask($request, $task);
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
