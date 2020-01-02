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

Route::redirect('/', '/booksource');
Route::prefix('/booksource')->group(function () {
    Route::get('/', ['uses' => 'MainDataController@showMain', 'as' => 'booksource.main']);
    Route::get('/index', ['uses' => 'MainDataController@showData', 'as' => 'booksource.index']);
    Route::get('/insert', ['uses' => 'MainDataController@addData', 'as' => 'booksource.insert']);
    Route::post('/store', ['uses' => 'MainDataController@storeData', 'as' => 'booksource.store']);
});