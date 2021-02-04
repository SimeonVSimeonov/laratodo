<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Todo extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table = 'todos';

    /**
     * @var string[]
     */
    protected $fillable = [
        'id',
        'user_id',
        'name',
        'is_completed'
    ];

    /**
     * @return HasMany
     */
    public function tasks(): HasMany
    {
        return $this->hasMany('App\Models\Task');
    }
}
