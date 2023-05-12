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
        return $this->task = Task::where('user_id', $userId)->get();
    }
    public function delete($id)
    {
        $task = $this->task->find($id);
        $task->delete();

        return $task;
    }
    public function addWork($task)
    {
        return $this->task->insert($task);
    }
}
