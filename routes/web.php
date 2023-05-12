<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\ToDoListController;
use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'login']);

Route::middleware(['login'])->group(function () {
    Route::get('/todo-list',[ToDoListController::class, 'getListToDo'])->name('todo.list');
    Route::delete('/todo-list/{id}',[ToDoListController::class, 'destroy']);
    Route::post('/todo-list',[ToDoListController::class, 'store']);
});
