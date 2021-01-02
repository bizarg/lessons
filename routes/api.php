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
          Route::group(['prefix' => 'categories', 'as' => 'categories.'], function () {
              Route::get('/', 'CategoryController@index')->name('index');
              Route::post('/', 'CategoryController@store')->name('store');
              Route::put('{category}', 'CategoryController@update')->name('update')->where('category', '[0-9]+');
              Route::get('{category}', 'CategoryController@show')->name('show')->where('category', '[0-9]+');
              Route::delete('{category}', 'CategoryController@destroy')->name('delete')->where('category', '[0-9]+');
          });

        Route::group(['prefix' => 'skills', 'as' => 'skills.'], function () {
            Route::get('/', 'SkillController@index')->name('index');
            Route::post('/', 'SkillController@store')->name('store');
            Route::put('{skill}', 'SkillController@update')->name('update')->where('skill', '[0-9]+');
            Route::get('{skill}', 'SkillController@show')->name('show')->where('skill', '[0-9]+');
            Route::delete('{skill}', 'SkillController@destroy')->name('delete')->where('skill', '[0-9]+');
        });

        Route::apiResources([
            'articles' => 'ArticleController',
            'users' => 'UserController',
            'notifications' => 'NotificationController'
        ]);
    });
});

