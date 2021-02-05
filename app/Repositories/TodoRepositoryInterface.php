<?php


namespace App\Repositories;


use App\Http\Requests\StoreTodoRequest;
use App\Http\Requests\UpdateTodoRequest;
use App\Models\Todo;

interface TodoRepositoryInterface
{
    public function getAllTodoByUser();

    public function createTodo(StoreTodoRequest $request);

    public function updateTodo(UpdateTodoRequest $request, Todo $todo);

    public function updateTodoStatus(Todo $todo);
}
