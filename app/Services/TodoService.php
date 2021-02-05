<?php


namespace App\Services;


use App\Models\Task;
use App\Models\Todo;
use App\Repositories\TaskRepository;
use App\Repositories\TodoRepositoryInterface;
use DateTime;
use DateTimeZone;
use Illuminate\Support\Facades\Auth;

class TodoService implements TodoServiceInterface
{
    /**
     * @var TaskRepository
     */
    private $taskRepository;

    /**
     * TodoService constructor.
     * @param TaskRepository $taskRepository
     */
    public function __construct(TaskRepository $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }

    public function statusCheck()
    {
       $all_todo_tasks =  Todo::with('tasks')
           ->where('user_id', '=', Auth::id())
           ->where('is_completed', '=', false)
           ->get();
       foreach ($all_todo_tasks as $todo_task){
           foreach($todo_task->tasks()->get() as $task){
               $end = $task->deadline->format('Y-m-d H:i:s');
               $date_now = new DateTime("now", new DateTimeZone('Europe/Sofia'));
               $format_now = $date_now->format('Y-m-d H:i:s');

               if ($end < $format_now){
                    $this->taskRepository->updateTaskStatus($task);
               }
           }
       }
    }
}
