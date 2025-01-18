<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/students',[StudentController::class,'index']);
Route::get('/student/{student}',[StudentController::class,'show']);
Route::post('student',[StudentController::class, 'store']);
Route::put('update/{student}', [StudentController::class, 'update']);
Route::delete('delete/{student}', [StudentController::class, 'delete']);

Route::post('signup',[UserController::class,'signup']);
Route::post('login',[UserController::class,'login']);