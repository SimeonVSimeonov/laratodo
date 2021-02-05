<?php


namespace App\Repositories;


use App\Models\Task;

class TaskRepository implements TaskRepositoryInterface
{

    public function getTasksByTodoId(int $id)
    {
        return Task::where('todo_id', '=', $id)->get();
    }
}
