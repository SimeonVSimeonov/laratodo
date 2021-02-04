<?php

namespace App\Rules;

use App\Models\Todo;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class UserTodoName implements Rule
{
    /**
     * @var Todo
     */
    private $todo;

    /**
     * Create a new rule instance.
     *
     * @param Todo $todo
     */
    public function __construct(Todo $todo)
    {
        //
        $this->todo = $todo;
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
        $exist_todo =  Todo::where('name', '=', $value)
            ->where('user_id', '=', Auth::id())
            ->first();
        if (!$exist_todo){
            return true;
        } elseif ($exist_todo->id === $this->todo->id) {
            return true;
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The name has already been taken!';
    }
}
