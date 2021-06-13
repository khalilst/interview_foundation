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

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::get('/user', fn(Request $request) => $request->user());

    Route::group([
        'prefix' => 'github',
        'namespace' => 'Github',
        'as' => 'github.',
    ], function () {

        /*** Github Token APIs ***/
        Route::group([
            'prefix' => 'token',
            'namespace' => 'Token',
            'as' => 'token.',
        ], function () {

            Route::get('/', 'GetController')->name('get');
            Route::post('/', 'StoreController')->name('store');

        });
        /*** End - Github Token APIs ***/

        /*** Github Stars API ***/
        Route::get('/stars', 'StarController')->name('stars');
        /*** End - Github Stars API ***/

    });
});
