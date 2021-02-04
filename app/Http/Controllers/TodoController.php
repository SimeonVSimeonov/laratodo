<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTodoRequest;
use App\Http\Requests\UpdateTodoRequest;
use App\Models\Todo;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;

class TodoController extends Controller
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
        return view('todo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreTodoRequest $request
     * @return Application|Factory|View|Response
     */
    public function store(StoreTodoRequest $request)
    {
        $request->validated();
        $todo = Todo::create(
            [
                'name' => $request->name,
                'user_id' => Auth::id(),
            ]
        );

        return view('todo.show', ['todo' => $todo]);
    }

    /**
     * Display the specified resource.
     *
     * @param Todo $todo
     * @return Application|Factory|View|Response
     */
    public function show(Todo $todo)
    {
        $tasks = $todo->tasks()->get();
        return view('todo.show', ['todo' => $todo, 'tasks' => $tasks]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Todo $todo
     * @return Application|Factory|View|Response
     */
    public function edit(Todo $todo)
    {
        return view('todo.edit', ['todo' => $todo]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateTodoRequest $request
     * @param Todo $todo
     * @return Application|RedirectResponse|Response|Redirector
     */
    public function update(UpdateTodoRequest $request, Todo $todo)
    {
        $request->validated();
        $todo->update(
            [
                'name' => $request->name,
                'is_completed' => $request->is_completed
            ]
        );

        return redirect('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Todo $todo
     * @return Application|RedirectResponse|Response|Redirector
     * @throws Exception
     */
    public function destroy(Todo $todo)
    {
        $todo->delete();
        return redirect('home');
    }
}
