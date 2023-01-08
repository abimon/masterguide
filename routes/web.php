<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\dataController;
use App\Http\Controllers\viewsController;
use Illuminate\Auth\Events\Logout;
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
    Route::get('/calendar', function () {
        return view('calendar');
    });
    
    Route::get('/mail', function () {
        return view('email');
    });
    Route::get('/compose', function () {
        return view('compose');
    });
    Route::post('/sendMessage/{id}', [dataController::class, 'sendMessage']);
    Route::post('/uploadresource', [dataController::class, 'uploadresource']);

    Route::get('/chat/{name}', [viewsController::class, 'convo']);
    Route::get('/dashboard', [viewsController::class, 'dashboard']);
});
Route::get('/chat', [viewsController::class,'chat']);
Route::get('team', [viewsController::class, 'team']);
Route::get('resources', [viewsController::class, 'resources']);
Route::get('/course/{name}', [viewsController::class, 'course']);
Route::get('/notes/{name}', [dataController::class, 'generatePDF']);
Route::get('/blog', function () {
    return view('blog');
});
Route::get('/blogpost', function () {
    return view('blogpost');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/events', function () {
    return view('events');
});

Route::get('/avatar', function () {
    return view('avatar');
});
Route::post('/avatarUpdate', [RegisterController::class, 'avatarUpdate']);
Auth::routes();
Route::get('/', function () {
    return view('index');
});
Route::get('/logout', function () {
    Auth::logout();
    return redirect('/login');
});
