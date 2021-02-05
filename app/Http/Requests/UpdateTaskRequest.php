<?php

namespace App\Http\Requests;

use App\Rules\TodoTaskName;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class UpdateTaskRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $todo_id = Request::get('todo_id');
        $task_id = $this->task->id;

        return [
            'name' => ['required','string','max:64', new TodoTaskName($todo_id, $task_id)],
            'deadline' => 'required|date|after:today',
            'is_completed' => 'required|boolean',
        ];
    }
}
