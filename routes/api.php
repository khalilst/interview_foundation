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
        'name' => 'github.',
    ], function () {

        /*** Token APIs ***/
        Route::group([
            'prefix' => 'token',
            'namespace' => 'Token',
            'name' => 'token.',
        ], function () {

            Route::get('/', 'GetController')->name('get');
            Route::post('/', 'StoreController')->name('store');

        });
        /*** End - Token APIs ***/

    });
});
