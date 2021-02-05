<?php


namespace App\Repositories;


use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Task;

class TaskRepository implements TaskRepositoryInterface
{

    public function getTasksByTodoId(int $id)
    {
        return Task::where('todo_id', '=', $id)->get();
    }

    public function createTask(StoreTaskRequest $request)
    {
        $request->validated();
        return Task::create(
            [
                'name' => $request->name,
                'todo_id' => $request->todo_id
            ]
        );
    }

    /**
     * @param UpdateTaskRequest $request
     * @param Task $task
     * @return bool|mixed
     */
    public function updateTask(UpdateTaskRequest $request, Task $task): bool
    {
        $request->validated();
        return $task->update(
            [
                'name' => $request->name,
                'is_completed' => $request->is_completed,
                'deadline' => $request->deadline
            ]
        );
    }
}
