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

Route::post('login', 'AuthController@login');

Route::group(['middleware' => 'api', 'prefix' => 'auth'], function () {

    Route::prefix('user')->group(function() {
        Route::get('me', 'AuthController@me');
        
        Route::post('refresh', 'AuthController@refresh');
        Route::post('logout', 'AuthController@logout');
    });
});