<?php


namespace App\Repositories;


use App\Http\Requests\StoreTodoRequest;
use App\Http\Requests\UpdateTodoRequest;
use App\Models\Todo;
use Illuminate\Support\Facades\Auth;

class TodoRepository implements TodoRepositoryInterface
{

    public function getAllTodoByUser()
    {
        return Todo::where('user_id', '=', Auth::id())->get();
    }

    /**
     * @param StoreTodoRequest $request
     * @return mixed
     */
    public function createTodo(StoreTodoRequest $request)
    {
        $request->validated();
        return Todo::create(
            [
                'name' => $request->name,
                'user_id' => Auth::id(),
            ]
        );
    }

    /**
     * @param UpdateTodoRequest $request
     * @param Todo $todo
     * @return bool|mixed
     */
    public function updateTodo(UpdateTodoRequest $request, Todo $todo): bool
    {
        $request->validated();
        return $todo->update(
            [
                'name' => $request->name,
                'is_completed' => $request->is_completed
            ]
        );
    }

    /**
     * @param Todo $todo
     * @return bool|mixed
     */
    public function updateTodoStatus(Todo $todo): bool
    {
        return $todo->update([
            'is_completed' => true
        ]);
    }
}
