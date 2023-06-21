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

Auth::routes();
Route::get('/',[viewsController::class, 'index']);
Route::get('/logout', function () {
    Auth::logout();
    return redirect('/login');
});
