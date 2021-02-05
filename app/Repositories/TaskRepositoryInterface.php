<?php


namespace App\Repositories;


use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Task;

interface TaskRepositoryInterface
{
    /**
     * @param int $id
     * @return mixed
     */
    public function getTasksByTodoId(int $id);

    /**
     * @param StoreTaskRequest $request
     * @return mixed
     */
    public function createTask(StoreTaskRequest $request);

    /**
     * @param UpdateTaskRequest $request
     * @param Task $task
     * @return mixed
     */
    public function updateTask(UpdateTaskRequest $request, Task $task);

    public function updateTaskStatus(Task $task);
}
