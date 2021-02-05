<?php

namespace App\Http\Controllers;

use App\Repositories\TodoRepository;
use App\Services\TodoService;
use Illuminate\Contracts\Support\Renderable;

class HomeController extends Controller
{
    /**
     * @var TodoRepository
     */
    private $todoRepository;
    /**
     * @var TodoService
     */
    private $todoService;

    /**
     * Create a new controller instance.
     *
     * @param TodoRepository $todoRepository
     * @param TodoService $todoService
     */
    public function __construct(TodoRepository $todoRepository, TodoService $todoService)
    {
        $this->middleware('auth');
        $this->todoRepository = $todoRepository;
        $this->todoService = $todoService;
    }

    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function index()
    {
        $this->todoService->statusCheck();
        $todos = $this->todoRepository->getAllTodoByUser();
        return view('home', ['todos' => $todos]);
    }
}
