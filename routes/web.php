<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/test', function () {
    dispatch(new \App\Jobs\TestJob(Auth::user()));
//    \App\Events\TestEvent::dispatch('message');
    broadcast(new \App\Events\TestEvent('message'));
});

Auth::routes();

Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');

//Route::get('/login/{network}', 'Auth\NetworkController@redirect')->name('login.network');
Route::get('/auth/{network}/callback', 'Auth\NetworkController@callback');

//Route::resource('articles', 'ArticleController');
//Route::get('list', 'ArticleController@list')->name('articles.list');
//Route::resource('users', 'UserController');
