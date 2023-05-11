<?php

namespace App\Service;

use App\Repository\ToDoListRepository;
use Illuminate\Support\Facades\Auth;

class ToDoListService
{
    protected $toDoListRepository;

    public function __construct(ToDoListRepository $toDoListRepository){
        $this->toDoListRepository = $toDoListRepository;
    }
    public function getAll(){
        $userId = Auth::user()->id;
        return $this->toDoListRepository->getAll($userId);
    }
}
