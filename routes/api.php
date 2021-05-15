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
Route::prefix('/post')->group(function (){
    Route::get('/',[\App\Http\Controllers\PostController::class,'index']);
    Route::get('/{post}',[\App\Http\Controllers\PostController::class,'show'])->middleware('auth:sanctum');
    Route::post('/',[\App\Http\Controllers\PostController::class,'store']);
    Route::put('/{id}',[\App\Http\Controllers\PostController::class,'update']);
    Route::delete('/{id}',[\App\Http\Controllers\PostController::class,'destroy']);
    Route::get('/search/{data}',[\App\Http\Controllers\PostController::class,'search']);
});

Route::post('/register',[\App\Http\Controllers\AuthController::class,'register']);
