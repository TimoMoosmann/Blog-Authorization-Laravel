<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BlogEntryController;
use App\Http\Controllers\LoginController;
use Illuminate\Auth\Middleware\Authenticate;

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

Route::get('/', function () {
    return redirect('blogEntries');
});

Route::resource('blogEntries', BlogEntryController::class);

Route::get('user/showall', [UserController::class, 'showAll']);
Route::get('user/dashboard', [UserController::class, 'showDashboard'])
    ->name('dashboard')->middleware('auth');

Route::get('login', [LoginController::class, 'show'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::get('logout', [LoginController::class, 'logout']);

