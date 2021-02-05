<?php

namespace App\Rules;

use App\Models\Task;
use Illuminate\Contracts\Validation\Rule;

class TodoTaskName implements Rule
{
    /**
     * @var int
     */
    private $todo_id;
    /**
     * @var int
     */
    private $task_id;

    /**
     * Create a new rule instance.
     *
     * @param int $todo_id
     * @param int|null $task_id
     */
    public function __construct(int $todo_id, ?int $task_id)
    {
        $this->todo_id = $todo_id;
        $this->task_id = $task_id;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        if(is_null($this->task_id)){
            $exist_task =  Task::where('name', '=', $value)
                ->where('todo_id', '=', $this->todo_id)
                ->first();
            if (!$exist_task){
                return true;
            }
        }else{
            $exist_task =  Task::where('id', '!=', $this->task_id)
                ->where('name', '=', $value)
                ->where('todo_id', '=', $this->todo_id)
                ->first();
            if (!$exist_task){
                return true;
            }
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'А task with this name already exists!';
    }
}
