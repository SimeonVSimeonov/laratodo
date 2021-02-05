<?php


namespace App\Repositories;


interface TaskRepositoryInterface
{
    /**
     * @param int $id
     * @return mixed
     */
    public function getTasksByTodoId(int $id);
}
