<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([ 'namespace' => 'Api','middleware' => ['api','cors']],function(){
    Route::post('auth/login', 'ApiController@login');
    Route::group(['middleware' => 'jwt-auth'], function () {
        Route::get('user', 'ApiController@getAuthUser');
    });
});
