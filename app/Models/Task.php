<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Task extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table = 'tasks';

    /**
     * @var string[]
     */
    protected $fillable = [
        'todo_id',
        'name',
        'deadline',
        'is_disabled',
        'is_completed'
    ];

    protected $dates = [
        'deadline'
    ];

    /**
     * @return BelongsTo
     */
    public function todo(): BelongsTo
    {
        return $this->belongsTo('App\Models\Todo');
    }
}
