<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Category;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function store(StoreTaskRequest $request)
    {
        $user_id = Auth::user()->id;    
        $ValidatedData = $request->validated();
        $ValidatedData['user_id'] = $user_id;

        $task = Task::create($ValidatedData);
        return response()->json($task, 201);
    }

    public function index()
    {
        $tasks = Auth::user()->tasks;
        return response()->json($tasks, 200);
    }

    public function getAllTasks()
    {
        $tasks = Task::all();
         return response()->json($tasks, 200);
    }

    public function update(UpdateTaskRequest $request, int $id)
    {
        $user_id = Auth::user()->id;
        $task = Task::findOrFail($id);

        if($task->user_id != $user_id){
        return response()->json(['message'=>'Unauthorized'], 403);
        }
            $task->update($request->validated());
        return response()->json($task, 200);
    }

    public function show(int $id)
    {
        $task = Task::findOrFail($id);
        return response()->json($task, 200);
    }

    public function destroy(int $id)
    {
        $task = Task::findOrFail($id);
        $task->delete();
        return response()->json(null, 204);
    }

    public function getTasksUser(int $id){
        $user = Task::findOrFail($id)->user;
        return  response()->json($user, 200);
    }
    public function addCategoriesToTask(Request $request, int $task_id)
    {
        $task = Task::findOrFail($task_id);
        $task->categories()->attach($request->category_id);
        return response()->json('Category attached successfully', 200);
    }

    public function getTaskCategories(int $taskId)
    {
        $categories = Task::findOrFail($taskId)->categories;
        return response()->json($categories, 200);
    }

    public function getCategoryTasks(int $categoryId)
    {
        $tasks = Category::findOrFail($categoryId)->tasks;
        return response()->json($tasks, 200);
    }
}