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
Route::post('user/login', 'API\UserController@login');
Route::post('user/register', 'API\UserController@register');


Route::group(['middleware' => ['role:company_member', 'auth:api']], function(){
    Route::get('users/me', function(){
        return Auth::user();
    });

    Route::resource('documents', 'DocumentController', [
        'only' => [
            'index','store'
        ]
    ]);

    Route::group(['prefix' => 'documents/{document_id}', 'as' => 'document.'], function() {
        Route::resource('iterations', 'DocumentIterationController', [
           'only' => [
               'store'
           ]
        ]);
    });
});
