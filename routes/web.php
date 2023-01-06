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

Route::get('/chat', [viewsController::class,'chat']);
Route::get('/calendar', function () {
    return view('calendar');
});

Route::get('/mail', function () {
    return view('email');
});
Route::get('/compose', function () {
    return view('compose');
});
Route::get('/blog', function () {
    return view('blog');
});
Route::get('/blogpost', function () {
    return view('blogpost');
});
Route::get('/about', function () {
    return view('about');
});
Route::get('/team', function () {
    return view('team');
});
Route::get('/contact', function () {
    return view('contact');
});
Route::get('/resources', function () {
    return view('course');
});
Route::get('/events', function () {
    return view('events');
});
Route::get('/dashboard', function () {
    return view('dashboard');
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
Route::post('/sendMessage/{id}', [dataController::class, 'sendMessage']);
