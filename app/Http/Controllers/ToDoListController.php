<?php

namespace App\Http\Controllers;

use App\Http\Requests\ToDoRequest;
use App\Service\ToDoListService;

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

    public function destroy($id)
    {
        $this->toDoListService->delete($id);
        return redirect()->route('todo.list');
    }
    public function store(ToDoRequest $toDoRequest)
    {
        $this->toDoListService->create($toDoRequest);
        return redirect()->route('todo.list');
    }
}
