<?php


namespace App\Repositories;


use App\Http\Requests\StoreTodoRequest;
use App\Http\Requests\UpdateTodoRequest;
use App\Models\Todo;

interface TodoRepositoryInterface
{
    /**
     * @return mixed
     */
    public function getAllTodoByUser();

    /**
     * @param StoreTodoRequest $request
     * @return mixed
     */
    public function createTodo(StoreTodoRequest $request);

    /**
     * @param UpdateTodoRequest $request
     * @param Todo $todo
     * @return mixed
     */
    public function updateTodo(UpdateTodoRequest $request, Todo $todo);

    /**
     * @param Todo $todo
     * @return mixed
     */
    public function updateTodoStatus(Todo $todo);
}
