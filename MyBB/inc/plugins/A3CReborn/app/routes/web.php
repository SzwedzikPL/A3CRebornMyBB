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

Route::prefix('/' . config('mybb.url_prefix') . '/gamercp/')->middleware(['auth'])->group(function() {
    Route::get('user', \App\Core\Http\Controllers\UserController::class);
});

Route::prefix(config('mybb.url_prefix') . '/cadrecp/')->middleware(['auth'])->group(function() {
    Route::post('badges/promote', \App\Badge\Http\Controllers\BadgePromoteController::class);
    Route::post('badges/take', \App\Badge\Http\Controllers\BadgeTakeController::class);
    Route::resource('badges', \App\Badge\Http\Controllers\BadgeController::class);
    Route::resource('badge-groups', \App\Badge\Http\Controllers\BadgeController::class);
});

Route::prefix(config('mybb.url_prefix') . '/api/')->group(function() {

});
