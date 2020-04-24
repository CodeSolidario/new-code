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

// public routes
Route::post('/login', 'Api\AuthController@login')->name('login.api');
Route::post('/register', 'Api\AuthController@register')->name('register.api');
Route::post('/reset-pass', 'Api\AuthController@validatePasswordReset');
Route::post('/verify-token', 'Api\AuthController@verifyToken');
Route::post('/alter-pass', 'Api\AuthController@alterPass');


// private routes
Route::middleware('auth:api')->group(function () {
    Route::get('/logout', 'Api\AuthController@logout')->name('logout');
    Route::resource('project', 'Api\ProjectController');
    Route::resource('user', 'Api\UserController');
    Route::resource('task', 'Api\TaskController');
    Route::resource('post', 'Api\PostController');
    Route::resource('comment', 'Api\CommentController');
    Route::post('/go-project', 'Api\ProjectController@goProject');
    Route::post('/user-image/{id}', 'Api\UserController@insertImage');
});
