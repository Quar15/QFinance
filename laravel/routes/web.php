<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ItemController;
use App\Http\Controllers\AccountController;

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
    return view('welcome');
});

/* Only for logged in users */
Route::get('/dashboard', [ItemController::class, 'dashboard']);
Route::get('/stats', [ItemController::class, 'stats']);
Route::get('/history', [ItemController::class, 'history']);

/* Account */
Route::get('/profile', [AccountController::class, 'profile']);
Route::get('/logout', [AccountController::class, 'logout']);

Route::get('/login', [AccountController::class, 'login']);
Route::get('/register', [AccountController::class, 'register']);
