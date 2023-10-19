<?php

use App\Http\Controllers\API\attendanceController;
use App\Http\Controllers\API\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/users/index',[UserController::class,'index']);

Route::get('/attendance/create/{id}',[attendanceController::class,'create']);