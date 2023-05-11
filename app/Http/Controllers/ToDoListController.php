<?php

namespace App\Http\Controllers;

use App\Service\ToDoListService;
use Illuminate\Http\Request;

class ToDoListController extends Controller
{
    protected $toDoListService;
    public function __construct(ToDoListService $toDoListService)
    {
        $this->toDoListService = $toDoListService;
    }
    public function getListToDo()
    {
        $listTask = $this->toDoListService->getAll();
        return view('todoList', compact('listTask'));
    }
}
