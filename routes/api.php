<?php

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

Route::get('/balance', 'BalanceController@find')->name('find.balance');

Route::post('/event', 'EventController@create')->name('create.event');

Route::post('/reset', 'ResetController@reset')->name('reset');
