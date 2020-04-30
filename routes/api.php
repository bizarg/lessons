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

Route::group(['as' => 'api.', 'middleware' => ['localization']], function () {
    Route::group(['prefix' => 'auth', 'as' => 'auth.', 'namespace' => 'Auth'], function () {
        Route::post('/login', 'AuthorizationController@login')->name('login');
        Route::post('/refresh', 'AuthorizationController@refreshToken')->name('refresh');

        Route::group(['middleware' => 'auth:api'], function () {
            Route::get('/logout', 'AuthorizationController@logout')->name('logout');
        });
    });

    Route::apiResources([
        'articles' => 'ArticleController',
        'users' => 'UserController'
    ]);
});
//Route::resource('languages', 'LanguageController');//Route::resource('languages', 'LanguageController');//Route::resource('languages', 'LanguageController');//Route::resource('languages', 'LanguageController');//Route::resource('languages', 'LanguageController');