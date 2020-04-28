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

Route::prefix(env('APP_API_URL_PREFIX', '/') . 'gamercp/')->middleware(['auth'])->group(function() {
    Route::get('/user', \App\Core\Http\Controllers\UserController::class);
});

Route::prefix(env('APP_API_URL_PREFIX', '/') . 'cadrecp/')->middleware(['auth'])->group(function() {
    Route::get('/user', \App\Core\Http\Controllers\UserController::class);
});

Route::prefix(env('APP_API_URL_PREFIX', '/') . 'api/')->group(function() {
    Route::get('/user', \App\Core\Http\Controllers\UserController::class);
});
