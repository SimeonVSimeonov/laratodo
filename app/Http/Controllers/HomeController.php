<?php

namespace App\Http\Controllers;

use App\Repositories\TodoRepository;
use Illuminate\Contracts\Support\Renderable;

class HomeController extends Controller
{
    /**
     * @var TodoRepository
     */
    private $todoRepository;

    /**
     * Create a new controller instance.
     *
     * @param TodoRepository $todoRepository
     */
    public function __construct(TodoRepository $todoRepository)
    {
        $this->middleware('auth');
        $this->todoRepository = $todoRepository;
    }

    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function index()
    {
        $todos = $this->todoRepository->getAllTodoByUser();
        return view('home', ['todos' => $todos]);
    }
}
