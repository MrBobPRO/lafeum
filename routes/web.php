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

Route::group(["middleware" => "auth"], function () {
    Route::get('/', 'MainController@index')->name('home');
    //quotes
    Route::get('/quotes', 'QuoteController@index')->name('quotes.index');
    Route::get('/quotes/{id}', 'QuoteController@single')->name('quotes.single');
    //authors
    Route::get('/authors', 'AuthorController@index')->name('authors.index');
    Route::get('/authors/{name}', 'AuthorController@single')->name('authors.single');
    //categories
    Route::get('/categories/{name}', 'CategoryController@single')->name('categories.single');
});




//--------------------------Dasboard start---------------------------
Route::group(["middleware" => "auth"], function () {
    Route::get('/dashboard', 'DashboardController@index');
});
//---------------------------Dasboard end---------------------------

require __DIR__.'/auth.php';