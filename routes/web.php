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

Route::get('/', function () {
    return view('welcome');
});

//route user
Route::prefix('users')->group(function () {
    Route::get('/','App\Http\Controllers\UserController@index');
    Route::get('/add', 'App\Http\Controllers\UserController@viewAdd')->name('viewAddUser');
    Route::post('/add', 'App\Http\Controllers\UserController@create')->name('createUser');
    Route::get('/{id}', 'App\Http\Controllers\UserController@get')->name('getUser');
    Route::put('/update', 'App\Http\Controllers\UserController@update')->name('updateUser');
    Route::delete('/{id}', 'App\Http\Controllers\UserController@delete')->name('deleteUser');
});


//route technologies
Route::prefix('technologies')->group(function () {
    Route::get('/','App\Http\Controllers\TechnologiesController@index');
    Route::get('/add', 'App\Http\Controllers\TechnologiesController@viewAdd')->name('viewAddTechnology');
    Route::post('/add', 'App\Http\Controllers\TechnologiesController@create')->name('createTechnology');
    Route::get('/{id}', 'App\Http\Controllers\TechnologiesController@get')->name('getTechnology');
    Route::put('/update', 'App\Http\Controllers\TechnologiesController@update')->name('updateTechnology');
    Route::delete('/{id}', 'App\Http\Controllers\TechnologiesController@delete')->name('deleteTechnology');
});

//route vehicles
Route::prefix('vehicles')->group(function () {
    Route::get('/','App\Http\Controllers\VehiclesController@index');
    Route::get('/add', 'App\Http\Controllers\VehiclesController@viewAdd')->name('viewAddVehicle');
    Route::post('/add', 'App\Http\Controllers\VehiclesController@create')->name('createVehicle');
    Route::get('/{id}', 'App\Http\Controllers\VehiclesController@get')->name('getVehicle');
    Route::put('/update', 'App\Http\Controllers\VehiclesController@update')->name('updateVehicle');
    Route::delete('/{id}', 'App\Http\Controllers\VehiclesController@delete')->name('deleteVehicle');
});