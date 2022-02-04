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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('login', 'App\Http\Controllers\UserController@login');
Route::post('register', 'App\Http\Controllers\UserController@register');

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::resource('article',App\Http\Controllers\ArticleController::class)->only(['index','store','show','update','destroy']);
    Route::get('Allcomment/{id}','App\Http\Controllers\CommentController@index');
    Route::post('comment/{id}','App\Http\Controllers\CommentController@store');
    Route::resource('comment',App\Http\Controllers\CommentController::class)->only(['show','update','destroy']);
    Route::post('logout', 'App\Http\Controllers\UserController@logout');
});

