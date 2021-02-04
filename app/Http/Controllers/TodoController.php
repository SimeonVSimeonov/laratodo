<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class TodoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {

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
     * @param  \Illuminate\Http\Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
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
     * @param  \App\Models\Todo  $todo
     * @return Response
     */
    public function show(Todo $todo)
    {
        $tasks = $todo->tasks()->get();
        return view('todo.show', ['todo' => $todo, 'tasks' => $tasks]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Todo  $todo
     * @return Response
     */
    public function edit(Todo $todo)
    {
        return view('todo.edit', ['todo' => $todo]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Todo  $todo
     * @return Response
     */
    public function update(Request $request, Todo $todo)
    {
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
     * @param  \App\Models\Todo  $todo
     * @return Response
     */
    public function destroy(Todo $todo)
    {
        $todo->delete();
        return redirect('home');
    }
}
