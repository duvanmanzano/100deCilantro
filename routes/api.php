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
Route::group([

    'middleware' => 'auth:api'

], function ($router) {
    Route::get('allUSers', 'AuthController@allUSers');       
    Route::post('storeMovie', 'MovieController@store');
    Route::post('storeReserve', 'ReserveController@store');
    Route::get('test', 'AuthController@test');    
});


Route::group([

    'middleware' => 'api'

], function ($router) {    
    Route::post('signin', 'AuthController@signin');
    Route::post('login', 'AuthController@login');
    Route::get('getMovie', 'MovieController@index');    
    Route::get('getDataMovie/{id_movie}', 'MovieController@getDataMovie'); 
});
