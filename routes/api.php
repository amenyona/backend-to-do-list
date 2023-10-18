<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\UserController;

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
Route::post('connect',[ApiController::class,'login']);
Route::get('user_liste',[UserController::class,'index']);
Route::post('user_store',[UserController::class,'store']);
Route::put('user_update',[UserController::class,'update']);
Route::put('user_destroy',[UserController::class,'destroy']);
Route::get('user_search/{arg}',[UserController::class,'search']);
Route::get("list/{id?}",[UserController::class,'show']);
