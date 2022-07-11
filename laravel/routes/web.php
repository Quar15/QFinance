<?php

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

Route::get('/', function () {
    return view('welcome');
});


/* Only for logged in users */
Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/stats', function () {
    return view('stats');
});

Route::get('/history', function () {
    return view('history');
});


/* Account */
Route::get('/profile', function () {
    return view('account/profile');
});

Route::get('/logout', function () {
    return view('account/logout');
});
