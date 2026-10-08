<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');


// Route::post('tasks',[TaskController::class,'store']);
// Route::get('tasks',[TaskController::class,'index']);
// Route::put('tasks/{id}',[TaskController::class,'update']);
// Route::get('tasks/{id}',[TaskController::class,'show']);
// Route::delete('tasks/{id}',[TaskController::class,'distroy']);

Route::middleware('auth:sanctum')->group(function()
{
    //بديلة عن اللي فوق
Route::apiResource('tasks',TaskController::class);

Route::post('task/all',[TaskController::class, 'getAllTasks'])->middleware('CheckUser');

Route::post('task/{id}/favorite',[TaskController::class, 'addToFavorites']);
Route::delete('task/{id}/favorite',[TaskController::class, 'removeFromFavorites']);
Route::get('task/favorites',[TaskController::class, 'getFavoritesTasks']);

Route::prefix('profile')->group(function(){
Route::post('',[ProfileController::class,'store']);
Route::get('/{id}',[ProfileController::class,'show']);
});

Route::get('user/{id}/profile',[UserController::class,'getProfile']);
Route::get('/user/{id}/tasks',[UserController::class,'getUserTasks']);

//بديله عن اول route
Route::get('user',[UserController::class,'getUser']);

Route::get('/task/ordered',[TaskController::class,'getTaskByPriority']);
Route::get('/task/{id}/user',[TaskController::class,'getTasksUser']);
Route::post('tasks/{taskId}/categories',[TaskController::class,'addCategoriesToTask']);
Route::get('tasks/{taskId}/categories',[TaskController::class,'getTaskCategories']);
Route::get('categories/{taskId}/tasks',[TaskController::class ,'getCategoryTasks']);

//login Routes
});
Route::post('login',[UserController::class,'login']);
Route::post('register',([UserController::class,'register']));
Route::post('logout',[UserController::class,'logout'])->middleware('auth:sanctum');