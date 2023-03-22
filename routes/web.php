<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\dataController;
use App\Http\Controllers\viewsController;
use Illuminate\Auth\Events\Logout;
use Illuminate\Routing\ViewController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::middleware(['checkSession'])->group(function(){
    Route::get('/mail', function () {
        return view('email');
    });
    Route::get('/compose', function () {
        return view('compose');
    });
    Route::post('/profile_update', [dataController::class, 'profile_update']);
    Route::post('/sendMessage/{id}', [dataController::class, 'sendMessage']);
    Route::post('/uploadresource', [dataController::class, 'uploadresource']);
    Route::post('/addEvent', [dataController::class, 'addEvent']);
    Route::post('/addPublicEvent', [dataController::class, 'addPublicEvent']);
    Route::get('/editEvent/{id}', [dataController::class, 'editEvent']);
    Route::get('/deleteEvent/{id}', [dataController::class, 'deleteEvent']);
    Route::post('/addInstitution', [dataController::class, 'addInstitution']);
    Route::post('/createPost', [dataController::class, 'createPost']);
    Route::get('/like/{id}',[dataController::class, 'like']);
    Route::get('/togglePost/{id}',[dataController::class, 'togglePost']);
    Route::post('/markAttendance',[dataController::class, 'markAttendance']);
    Route::get('/make/{role}/{id}',[dataController::class, 'makeRole']);
    Route::post('/deleteUser/{id}',[dataController::class, 'deleteUser']);
    Route::post('/addLesson',[dataController::class, 'addLesson']);
    Route::get('/deleteLesson/{id}',[dataController::class, 'deleteLesson']);
    Route::post('/updateLesson/{id}',[dataController::class, 'updateLesson']);
    Route::post('/commentLesson/{id}',[dataController::class, 'commentLesson']);
    Route::post('/testimony',[dataController::class, 'addtestimony']);
    Route::get('/deletetestimony/{id}',[dataController::class, 'deletetestimony']);
    Route::post('/updatetestimony/{id}',[dataController::class, 'updatetestimony']);

    Route::get('/chat/{name}', [viewsController::class, 'convo']);
    Route::get('/attendance', [viewsController::class, 'attendance']);
    Route::get('/dashboard', [viewsController::class, 'dashboard']);
    Route::get('/calendar', [viewsController::class, 'calendar']);
    
    Route::get('/lesson', [viewsController::class, 'lesson']);

});
Route::get('/reg/{title}',[viewsController::class, 'activity']);
Route::get('/chat', [viewsController::class,'chat']);
Route::get('team', [viewsController::class, 'team']);
Route::get('resources', [viewsController::class, 'resources']);
Route::get('/course/{name}', [viewsController::class, 'course']);
Route::get('/notes/{name}', [dataController::class, 'generatePDF']);
Route::get('/events', [viewsController::class, 'events']);
Route::get('/blog',[viewsController::class, 'blog']);
Route::get('/blogpost/{title}',[viewsController::class, 'blogpost']);
Route::post('/comment/{id}',[dataController::class, 'comment']);
Route::post('/activityreg',[dataController::class, 'event_reg']);
Route::get('/contact', function () {
    return view('contact');
});


Route::get('/avatar', function () {
    return view('avatar');
});
Auth::routes();
Route::get('/',[viewsController::class, 'index']);
Route::get('/logout', function () {
    Auth::logout();
    return redirect('/login');
});
