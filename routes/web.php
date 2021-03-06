<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/test', function () {
    dispatch(new \App\Jobs\TestJob(Auth::user()));
//    \App\Events\TestEvent::dispatch('message');
    broadcast(new \App\Events\TestEvent('message'));
});

Auth::routes();

Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/login/{network}', 'Auth\NetworkController@redirect')->name('login.network');
Route::get('/auth/{network}/callback', 'Auth\NetworkController@callback');

Route::resource('articles', 'ArticleController')->only(['index', 'show', 'edit', 'create']);
Route::resource('tags', 'TagController');
Route::resource('notifications', 'NotificationController');



