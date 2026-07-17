<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Category;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function store(StoreTaskRequest $request)
    {
       $task = Task::create($request -> validated());
        return response()->json($task, 201);
    }
    public function index ()
    {
        $task = Task::all();
        return response()->json($task, 200);
    }
    public function update (UpdateTaskRequest $request,int $id)
    {
        $task = Task::findOrFail($id);
        $task -> update($request -> validated());
        return response()->json($task, 200);
    }
    public function show(int $id)
    {
        $task = Task::find($id);
        return response()->json($task, 200);
    }
    public function distroy (int $id){
        $Task = Task::find($id);
        $Task -> delete();
        return response()->json(Null , 204);
    }
    public function addCategoriesToTask(request $request,int $task_id)
    {
       $task = Task::findOrFail($task_id);
       $task-> categories()->attach($request -> category_id);
       return response()->json('category attached succesfully', 200);
    }
    public function getTaskCategories(int $taskId)
    {
        $categories = Task::findOrFail($taskId)->categories;
        return response()->json($categories, 200);
    }
    public function getCategoryTasks(int $taskId)
    {
        $tasks = Category::findOrFail($taskId)->tasks;
        return response()->json($tasks, 200);
    }
}
