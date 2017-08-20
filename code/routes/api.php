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

Route::group(['prefix' => 'v1', 'as' => 'v1.'], function() {

    Route::post('/user/login', 'AuthenticationController@login');
    Route::post('/user/signup', 'AuthenticationController@signUp');

    Route::group(['middleware' => 'jwt.auth'], function () {

        Route::get('/documents', 'Documents\\DocumentController@all');
        Route::post('/documents', 'Documents\\DocumentController@create');
        Route::post('/documents/{document_id}/iterate', 'Documents\\DocumentIterationController@create');
    });

});