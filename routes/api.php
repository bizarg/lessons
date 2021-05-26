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
        Route::group(['prefix' => 'articles', 'as' => 'articles.'], function () {
            Route::get('/', 'ArticleController@index')->name('index');
        });

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

        Route::group(['prefix' => 'users', 'as' => 'users.'], function () {
            Route::put('{user}/role', 'UserController@updateUserRole')->name('update.role');
        });

//        Route::group(['prefix' => 'roles', 'as' => 'roles.'], function () {
//            Route::get('/', 'RoleController@index')->name('index');
//            Route::post('/', 'RoleController@store')->name('store');
//            Route::put('{role}', 'RoleController@update')->name('update')->where('role', '[0-9]+');
//            Route::get('{role}', 'RoleController@show')->name('show')->where('role', '[0-9]+');
//            Route::delete('{role}', 'RoleController@destroy')->name('delete')->where('role', '[0-9]+');
//        });

        //  Route::group(['prefix' => 'permissions', 'as' => 'permissions.'], function () {
        //      Route::get('/', 'PermissionController@index')->name('index');
        //      Route::post('/', 'PermissionController@store')->name('store');
        //      Route::put('{permission}', 'PermissionController@update')->name('update')->where('permission', '[0-9]+');
        //      Route::get('{permission}', 'PermissionController@show')->name('show')->where('permission', '[0-9]+');
        //      Route::delete('{permission}', 'PermissionController@destroy')->name('delete')->where('permission', '[0-9]+');
        //  });

        Route::apiResources([
            'articles' => 'ArticleController',
            'users' => 'UserController',
            'notifications' => 'NotificationController',
            'roles' => 'RoleController',
            'permissions' => 'PermissionController',
            'rooms' => 'RoomController',
            'messages' => 'MessageController',
        ]);
    });
});

        //  Route::group(['prefix' => 'rooms', 'as' => 'rooms.'], function () {
        //      Route::get('/', 'RoomController@index')->name('index');
        //      Route::post('/', 'RoomController@store')->name('store');
        //      Route::put('{room}', 'RoomController@update')->name('update')->where('room', '[0-9]+');
        //      Route::get('{room}', 'RoomController@show')->name('show')->where('room', '[0-9]+');
        //      Route::delete('{room}', 'RoomController@destroy')->name('delete')->where('room', '[0-9]+');
        //  });
        //  Route::group(['prefix' => 'messages', 'as' => 'messages.'], function () {
        //      Route::get('/', 'MessageController@index')->name('index');
        //      Route::post('/', 'MessageController@store')->name('store');
        //      Route::put('{message}', 'MessageController@update')->name('update')->where('message', '[0-9]+');
        //      Route::get('{message}', 'MessageController@show')->name('show')->where('message', '[0-9]+');
        //      Route::delete('{message}', 'MessageController@destroy')->name('delete')->where('message', '[0-9]+');
        //  });
