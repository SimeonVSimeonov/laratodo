<?php


namespace App\Services;


use App\Models\Todo;
use App\Repositories\TaskRepository;
use App\Repositories\TodoRepository;
use DateTime;
use DateTimeZone;
use Exception;
use Illuminate\Support\Facades\Auth;

class TodoService implements TodoServiceInterface
{
    /**
     * @var TaskRepository
     */
    private $taskRepository;
    /**
     * @var TodoRepository
     */
    private $todoRepository;

    /**
     * TodoService constructor.
     * @param TaskRepository $taskRepository
     * @param TodoRepository $todoRepository
     */
    public function __construct(TaskRepository $taskRepository, TodoRepository $todoRepository)
    {
        $this->taskRepository = $taskRepository;
        $this->todoRepository = $todoRepository;
    }

    /**
     * @return mixed|void
     * @throws Exception
     */
    public function statusCheck()
    {
       $all_todo_tasks =  Todo::with('tasks')
           ->where('user_id', '=', Auth::id())
           ->where('is_completed', '=', false)
           ->get();

       foreach ($all_todo_tasks as $todo_task){
           if($todo_task->tasks()->get()->count() !== 0){
               foreach($todo_task->tasks()->get() as $task){
                   $end = $task->deadline->format('Y-m-d H:i:s');
                   $date_now = new DateTime("now", new DateTimeZone('Europe/Sofia'));
                   $format_now = $date_now->format('Y-m-d H:i:s');

                   if ($end < $format_now){
                       $this->taskRepository->updateTaskStatus($task);
                   }
               }
               if($todo_task->tasks()->where('is_completed', '=', false)->get()->count() === 0) {
                   $this->todoRepository->updateTodoStatus($todo_task);
               }
           }
       }
    }
}
