<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('login', [App\Http\Controllers\AuthController::class, 'login']);

Route::group(['middleware' => 'jwt'], function () {

    Route::prefix('user')->group(function() {
        Route::get('me', [App\Http\Controllers\AuthController::class, 'me']);
        
        Route::post('refresh', [App\Http\Controllers\AuthController::class, 'refresh']);
        Route::post('logout', [App\Http\Controllers\AuthController::class, 'logout']);
    });
});