<?php

namespace App\Repository;

use App\Models\Task;

class ToDoListRepository
{
    protected $task;

    public function __construct(Task $task)
    {
        $this->task = $task;
    }
    public function getAll($userId)
    {
        return $this->task = Task::where('user_id',$userId)->get();
    }
}
