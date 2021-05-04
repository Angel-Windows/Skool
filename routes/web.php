<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\HomeController;

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/', [HomeController::class, 'home'])->name('home');
Route::group(['middleware'=>'auth'], function () {
    Route::group(['middleware' => 'role:moderator'], function () {
        Route::prefix('calendar')->group(function () {
            Route::get('/', [CalendarController::class, 'index'])->name('calendar.personal');
            Route::get('schedule', [CalendarController::class, 'calendar'])->name('calendar.schedule');
            Route::prefix('lesson')->group(function () {
                Route::get('/', [CalendarController::class, 'lesson'])->name('calendar.lesson');
                Route::get('{page}', [CalendarController::class, 'lesson'])->name('calendar.lessons');
            });
            Route::get('contact', [CalendarController::class, 'schedule'])->name('calendar.contact');
        });
    });
});
//Route::prefix('users')->group(function () {
//    Route::get('authorization', 'App\Http\Controllers\UsersController@authorization')->name('authorization');
//    Route::post('auth', 'App\Http\Controllers\UsersController@auth')->name('auth');
//    Route::get('registration', 'App\Http\Controllers\UsersController@registration')->name('registration');
//    Route::post('register', 'App\Http\Controllers\UsersController@register')->name('register');
//});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
