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
    Route::get('/authors', ['uses' => 'MainDataController@getAuthors', 'as' => 'booksource.authors']);
    Route::get('/books', ['uses' => 'MainDataController@getBooks', 'as' => 'booksource.books']);

});
Auth::routes();

Route::get('/booksource/home', 'HomeController@index')->name('home');
Route::prefix('/booksource')->group(function () {
    Route::get('/index', ['uses' => 'MainDataController@showData', 'as' => 'booksource.index']);
    Route::get('/insert', ['uses' => 'MainDataController@addData', 'as' => 'booksource.insert']);
    Route::post('/store', ['uses' => 'MainDataController@storeData', 'as' => 'booksource.store']);
    Route::get('/users', ['uses' => 'MainDataController@getUsers', 'as' => 'booksource.users']);
    Route::get('/user/edit/{id}', ['uses' => 'MainDataController@editUser', 'as' => 'booksource.user.edit']);
    Route::post('/user/update/{id}', ['uses' => 'MainDataController@updateUser', 'as' => 'booksource.user.update']);
    Route::post('/user/delete/{id}', ['uses' => 'MainDataController@deleteUser', 'as' => 'booksource.user.delete']);
    Route::get('/user/add/', ['uses' => 'MainDataController@addUser', 'as' => 'booksource.user.add']);
    Route::post('/user/store', ['uses' => 'MainDataController@createUser', 'as' => 'booksource.user.store']);

    Route::get('/books/admin', ['uses' => 'MainDataController@getAllBooks', 'as' => 'booksource.books.admin']);
    Route::get('/books/edit/{id}', ['uses' => 'MainDataController@editBook', 'as' => 'booksource.books.edit']);
    Route::post('/books/update/{id}', ['uses' => 'MainDataController@updateBook', 'as' => 'booksource.books.update']);
    Route::post('/books/delete/{id}', ['uses' => 'MainDataController@deleteBook', 'as' => 'booksource.books.delete']);

    Route::get('/authors/admin', ['uses' => 'MainDataController@getAllAuthors', 'as' => 'booksource.authors.admin']);
    Route::get('/authors/edit/{id}', ['uses' => 'MainDataController@editAuthor', 'as' => 'booksource.authors.edit']);
    Route::post('/authors/update/{id}', ['uses' => 'MainDataController@updateAuthor', 'as' => 'booksource.authors.update']);
    Route::post('/authors/delete/{id}', ['uses' => 'MainDataController@deleteAuthor', 'as' => 'booksource.authors.delete']);

    Route::get('/', ['uses' => 'MainDataController@showMain', 'as' => 'booksource.main']);
    Route::get('/authors', ['uses' => 'MainDataController@getAuthors', 'as' => 'booksource.authors']);
    Route::get('/books', ['uses' => 'MainDataController@getBooks', 'as' => 'booksource.books']);
});