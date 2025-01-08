<?php

use App\Http\Controllers\messageLogsController;
use App\Http\Controllers\remindersController;
use App\Http\Controllers\settingsController;
use App\Http\Controllers\templateMessageController;
use App\Http\Controllers\usersController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return Auth::check() ? redirect('/home') : view('auth.login');
});

Auth::routes();

//User Routes
Route::middleware(['auth','user-role:user'])->group(function()
{
    Route::get("/home",[App\Http\Controllers\HomeController::class, 'userHome'])->name("home");

    Route::resource('reminders', remindersController::class);
    Route::resource('messagelogs', messageLogsController::class);
    Route::resource('settings', settingsController::class);
    Route::resource('users', usersController::class);
    Route::resource('template', templateMessageController::class);
});

//Admin Routes
Route::middleware(['auth','user-role:admin'])->group(function()
{
    Route::get("/admin/home",[App\Http\Controllers\HomeController::class, 'adminHome'])->name("admin.home");

});

