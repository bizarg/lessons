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

    Route::group(['middleware' => 'auth:api'], function () {
        Route::group(['prefix' => 'user-projects', 'as' => 'userProject.'], function () {
            Route::get('/', 'UserProjectController@index')->name('index');
            Route::post('/', 'UserProjectController@store')->name('store');
            Route::put('{userProject}', 'UserProjectController@update')->name('update')->where('userProject', '[0-9]+');
            Route::get('{userProject}', 'UserProjectController@show')->name('show')->where('userProject', '[0-9]+');
            Route::delete('{userProject}', 'UserProjectController@destroy')->name('delete')->where('userProject', '[0-9]+');
        });


        Route::apiResources([
            'articles' => 'ArticleController',
            'users' => 'UserController',
            'notifications' => 'NotificationController'
        ]);
    });
});
