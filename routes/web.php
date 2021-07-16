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
Route::get('/{any}', 'App\Http\Controllers\SpaController@index')->where('any', '.*');

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::prefix('users')->group(function () {
//     Route::get('/','App\Http\Controllers\UserController@index');
//     Route::get('/add', 'App\Http\Controllers\UserController@viewAddUser')->name('viewAddUser');
//     Route::post('/add', 'App\Http\Controllers\UserController@createUser')->name('postUser');
//     Route::get('/{id}', 'App\Http\Controllers\UserController@getUser')->name('getUser');
//     Route::put('/update', 'App\Http\Controllers\UserController@updateUser')->name('updateUser');
//     Route::delete('/{id}', 'App\Http\Controllers\UserController@deleteUser')->name('deleteUser');
// });

// Route::prefix('technologies')->group(function () {
//     Route::get('/','App\Http\Controllers\TechnologiesController@index');
//     Route::get('/add', 'App\Http\Controllers\TechnologiesController@viewAddTechnology')->name('viewAddTechnology');
//     Route::post('/add', 'App\Http\Controllers\TechnologiesController@createTechnology')->name('createTechnology');
//     Route::get('/{id}', 'App\Http\Controllers\TechnologiesController@getTechnology')->name('getTechnology');
//     Route::put('/update', 'App\Http\Controllers\TechnologiesController@updateTechnology')->name('updateTechnology');
//     Route::delete('/{id}', 'App\Http\Controllers\TechnologiesController@deleteTechnology')->name('deleteTechnology');
// });

// Route::prefix('users')->group(function () {
//     Route::get('/','App\Http\Controllers\UserController@index');
//     Route::get('/add', 'App\Http\Controllers\UserController@viewAddUser')->name('viewAddUser');
//     Route::post('/add', 'App\Http\Controllers\UserController@createUser')->name('postUser');
//     Route::get('/{id}', 'App\Http\Controllers\UserController@getUser')->name('getUser');
//     Route::put('/update', 'App\Http\Controllers\UserController@updateUser')->name('updateUser');
//     Route::delete('/{id}', 'App\Http\Controllers\UserController@deleteUser')->name('deleteUser');
// });

// Route::prefix('technologies')->group(function () {
//     Route::get('/','App\Http\Controllers\TechnologiesController@index');
//     Route::get('/add', 'App\Http\Controllers\TechnologiesController@viewAddTechnology')->name('viewAddTechnology');
//     Route::post('/add', 'App\Http\Controllers\TechnologiesController@createTechnology')->name('createTechnology');
//     Route::get('/{id}', 'App\Http\Controllers\TechnologiesController@getTechnology')->name('getTechnology');
//     Route::put('/update', 'App\Http\Controllers\TechnologiesController@updateTechnology')->name('updateTechnology');
//     Route::delete('/{id}', 'App\Http\Controllers\TechnologiesController@deleteTechnology')->name('deleteTechnology');
// });
