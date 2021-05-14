<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/post',[\App\Http\Controllers\PostController::class,'index']);
Route::get('/post/{post}',[\App\Http\Controllers\PostController::class,'show'])->middleware('auth:sanctum');
Route::post('/post',[\App\Http\Controllers\PostController::class,'store'])->middleware('auth:sanctum');
Route::put('/post/{id}',[\App\Http\Controllers\PostController::class,'update']);
Route::delete('/post{id}',[\App\Http\Controllers\PostController::class,'destroy']);
Route::get('/post/search/{data}',[\App\Http\Controllers\PostController::class,'search']);
Route::post('/register',[\App\Http\Controllers\AuthController::class,'register']);
