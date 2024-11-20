<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TaskController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post("logout",[UserController::class,'logout']);
Route::post('addtask',[TaskController::class,'addTask']);
Route::delete('delete/{id}',[TaskController::class,'destroy']);
Route::get('tasks_liste',[TaskController::class,'index']);
Route::get('task/{id}', [TaskController::class,'getTask']);
Route::put('task/{id}',[TaskController::class,'update']);
Route::post('login',[ApiController::class,'login']);
Route::get('user_liste',[UserController::class,'index']);
Route::put('taskcompleted/{id}',[TaskController::class,'complete']);
Route::get('completed_task_list',[TaskController::class,'indexcompleted']);


