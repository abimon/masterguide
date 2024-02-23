<?php

use App\Http\Controllers\API\attendanceController;
use App\Http\Controllers\API\chatController;
use App\Http\Controllers\API\eventController;
use App\Http\Controllers\API\LessonController;
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
    Route::post('/user/update/{id}','update');
    Route::post('/user/destroy/{id}','destroy');
    Route::post('/user/show/{id}','show');

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
    Route::get('/posts/show/{title}','show');
    Route::post('/post/comment','store');
});

//EVENTS
Route::controller(eventController::class)->group(function(){
    Route::get('/events/index','index');
    Route::post('/events/create','create');
    Route::get('/events/show/{title}','show');
});

//LESSONS
Route::controller(LessonController::class)->group(function(){
    Route::get('/lesson/index','index');
    Route::post('/lesson/create','create');
    Route::get('/lesson/show/{title}','show');
    Route::get('/lesson/update/{id}','update');
});

