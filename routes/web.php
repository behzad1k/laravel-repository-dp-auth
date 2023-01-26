<?php

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
require 'admin.php';

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');

Route::group(['middleware' => 'auth'], function (){
    //user authentication
    Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
    //users
    Route::group(['prefix' => 'users'],function () {
        Route::get('index','App\Http\Controllers\UserController@index')->name('users.index');
        Route::get('create','App\Http\Controllers\UserController@create')->name('users.create');
        Route::put('store','App\Http\Controllers\UserController@store')->name('users.store');
        Route::get('edit/{user:id}','App\Http\Controllers\UserController@edit')->name('users.edit');
        Route::put('update/{user:id}','App\Http\Controllers\UserController@update')->name('users.update');
        Route::get('delete/{user:id}','App\Http\Controllers\UserController@delete')->name('users.delete');
    });
});
