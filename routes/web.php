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
    Route::get('/', 'MainController@index');
});


//--------------------------Dasboard start---------------------------
Route::group(["middleware" => "auth"], function () {
    Route::get('/dashboard', 'QuotesController@dash_index');
});
//---------------------------Dasboard end---------------------------

require __DIR__.'/auth.php';