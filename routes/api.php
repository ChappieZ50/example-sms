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

Route::middleware('api')->group(function () {
    Route::prefix('user')->group(function () {
        Route::post('register', 'UserController@register');
        Route::post('login', 'UserController@login');
    });

    Route::middleware('auth:api')->group(function () {
        Route::apiResource('sms', 'SmsController')->except('destroy','update');
    });
});

