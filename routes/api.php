<?php

use App\Http\Controllers\API\attendanceController;
use App\Http\Controllers\API\chatController;
use App\Http\Controllers\API\PostContoller;
use App\Http\Controllers\API\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
//USER
Route::controller(UserController::class)->group(function () {
    Route::get('/users/index', 'index');
    Route::post('/user/login','login');
    Route::post('/user/create','create');

});
//Attendance
Route::controller(attendanceController::class)->group(function(){
    Route::get('/attendance/create/{id}', 'create');
});
//MESSAGES
Route::controller(chatController::class)->group(function () {
    Route::get('/chat/index/{id}', 'index');
    Route::get('/chat/show/{id}/{userId}', 'show');
    Route::post('/chat/create', 'create');
});

//POSTS
Route::controller(PostContoller::class)->group(function(){
    Route::get('/posts/index','index');
    Route::get('/posts/show/{title}');
});