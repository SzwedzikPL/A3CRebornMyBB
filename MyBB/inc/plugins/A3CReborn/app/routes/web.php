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

Route::prefix(config('api.url_prefix') . 'gamercp/')->middleware(['auth'])->group(function() {
    Route::get('/user', \App\Core\Http\Controllers\UserController::class);
});

Route::prefix(config('api.url_prefix') . 'cadrecp/')->middleware(['auth'])->group(function() {
    Route::get('/user', \App\Core\Http\Controllers\UserController::class);
});

Route::prefix(config('api.url_prefix') . 'api/')->group(function() {
    Route::get('/user', \App\Core\Http\Controllers\UserController::class);
});
