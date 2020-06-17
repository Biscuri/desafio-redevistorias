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

Route::prefix('urls')->group(function(){
    Route::get('/{id}', 'ApiController@getUrl');
    Route::delete('/{id}', 'ApiController@deleteUrl');
});

Route::prefix('stats')->group(function(){
    Route::get('/', 'ApiController@getStats');
    Route::get('/{id}', 'ApiController@getStatsUrl');
});

Route::prefix('users')->group(function(){
    Route::post('/', 'ApiController@createUser');
    Route::post('/{id}/urls', 'ApiController@createUrl');
    Route::get('/{id}/stats', 'ApiController@getStatsUser');
});

Route::delete('/user/{id}', 'ApiController@deleteUser');