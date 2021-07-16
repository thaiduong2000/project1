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
<<<<<<< HEAD
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
=======
Route::get('/', function () {
    return view('welcome');
});

//route user
Route::prefix('users')->group(function () {
    Route::get('/sort-delete','App\Http\Controllers\UserController@sortDelete');
    Route::get('/','App\Http\Controllers\UserController@index');
    Route::get('/add', 'App\Http\Controllers\UserController@viewAdd')->name('viewAddUser');
    Route::post('/add', 'App\Http\Controllers\UserController@create')->name('createUser');
    Route::get('/{id}', 'App\Http\Controllers\UserController@viewUpdate')->name('viewUpdateUser');
    Route::put('/update', 'App\Http\Controllers\UserController@update')->name('updateUser');
    Route::delete('/{id}', 'App\Http\Controllers\UserController@delete')->name('deleteUser');

});

Route::prefix('technologies')->group(function () {
    Route::get('/','App\Http\Controllers\TechnologiesController@index');
    Route::get('/add', 'App\Http\Controllers\TechnologiesController@viewAdd')->name('viewAddTechnology');
    Route::post('/add', 'App\Http\Controllers\TechnologiesController@create')->name('createTechnology');
    Route::get('/{id}', 'App\Http\Controllers\TechnologiesController@viewUpdate')->name('viewUpdateTechnology');
    Route::put('/update', 'App\Http\Controllers\TechnologiesController@update')->name('updateTechnology');
    Route::delete('/{id}', 'App\Http\Controllers\TechnologiesController@delete')->name('deleteTechnology');
});

//route vehicles
Route::prefix('vehicles')->group(function () {
    Route::get('/','App\Http\Controllers\VehiclesController@index');
    Route::get('/add', 'App\Http\Controllers\VehiclesController@viewAdd')->name('viewAddVehicle');
    Route::post('/add', 'App\Http\Controllers\VehiclesController@create')->name('createVehicle');
    Route::get('/{id}', 'App\Http\Controllers\VehiclesController@viewUpdate')->name('viewUpdateVehicle');
    Route::put('/update', 'App\Http\Controllers\VehiclesController@update')->name('updateVehicle');
    Route::delete('/{id}', 'App\Http\Controllers\VehiclesController@delete')->name('deleteVehicle');
});
>>>>>>> b748ac3feb61722e33150db130165ce37551985f
