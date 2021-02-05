<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTodoRequest;
use App\Http\Requests\UpdateTodoRequest;
use App\Models\Todo;
use App\Repositories\TaskRepository;
use App\Repositories\TodoRepository;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;

class TodoController extends Controller
{
    /**
     * @var TodoRepository
     */
    private $todoRepository;
    /**
     * @var TaskRepository
     */
    private $taskRepository;

    /**
     * TodoController constructor.
     * @param TodoRepository $todoRepository
     * @param TaskRepository $taskRepository
     */
    public function __construct(TodoRepository $todoRepository, TaskRepository $taskRepository)
    {
        $this->middleware('auth');
        $this->todoRepository = $todoRepository;
        $this->taskRepository = $taskRepository;
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
        $todo = $this->todoRepository->createTodo($request);
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
        $tasks = $this->taskRepository->getTasksByTodoId($todo->id);
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
        $this->todoRepository->updateTodo($request, $todo);
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
