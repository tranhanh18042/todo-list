<?php

namespace App\Service;

use App\Http\Requests\ToDoRequest;
use App\Repository\ToDoListRepository;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ToDoListService
{
    protected $toDoListRepository;

    public function __construct(ToDoListRepository $toDoListRepository)
    {
        $this->toDoListRepository = $toDoListRepository;
    }
    public function getAll()
    {
        $userId = Auth::user()->id;
        return $this->toDoListRepository->getAll($userId);
    }
    public function delete($id)
    {
        DB::beginTransaction();
        try {
            $task = $this->toDoListRepository->delete($id);
        } catch (Exception $e) {
            DB::rollBack();
        }
        DB::commit();
        return $task;
    }
    public function create(ToDoRequest $toDoRequest)
    {
        $user_id = Auth::user()->id;
        $task = [
            'name' => $toDoRequest->name,
            'user_id' => $user_id,
        ];
        return $this->toDoListRepository->addWork($task);
    }
}
