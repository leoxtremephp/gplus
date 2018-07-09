<?php

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

use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
|
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return !Auth::check() ? view('auth.login') : view('app.dashboard');
});

/*
|--------------------------------------------------------------------------
| Routes for unauthenticated Users
|--------------------------------------------------------------------------
*/
Route::group(['middleware' => 'guest'], function () {
    Route::post('login', 'Auth\AuthController@login')->name('login');
});

/*
|--------------------------------------------------------------------------
| Routes for authenticated users
|--------------------------------------------------------------------------
*/
Route::group(['middleware' => 'auth'], function () {
    Route::post('logout', 'Auth\AuthController@logout')->name('logout');
});