<?php

use App\Http\Controllers\QuoteController;
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
    Route::get("/", "MainController@index")->name("home");
    //quotes
    Route::get("/quotes", "QuoteController@index")->name("quotes.index");
    Route::get("/quotes/{id}", "QuoteController@single")->name("quotes.single");
    //authors
    Route::get("/authors", "AuthorController@index")->name("authors.index");
    Route::get("/authors/{name}", "AuthorController@single")->name("authors.single");
    //categories
    Route::get("/categories/{url}", "CategoryController@single")->name("categories.single");

    Route::post("/refresher/update", "MainController@update_refresher")->name("refresher.update");
    Route::post("/quotes/filter", "QuoteController@filter")->name("quotes.filter");
    Route::post("/authors/filter", "AuthorController@filter")->name("authors.filter");

    Route::get("/search", "MainController@search")->name("search");
});

//--------------------------Dasboard start---------------------------
Route::group(["middleware" => "auth"], function () {
    //quotes
    Route::get("/dashboard", "DashboardController@index")->name("dashboard.index");
    Route::get("/dashboard/quotes/create", "QuoteController@dashboard_create")->name("dashboard.quotes.create");
    Route::get("/dashboard/quotes/{id}", "QuoteController@dashboard_single")->name("dashboard.quotes.single");

    Route::post("/quotes/update", "QuoteController@update")->name("quotes.update");
    Route::post("/quotes/store", "QuoteController@store")->name("quotes.store");
    Route::post("/quotes/remove", "QuoteController@remove")->name("quotes.remove");
    Route::post("/quotes/remove_multiple", "QuoteController@remove_multiple")->name("quotes.remove_multiple");

    //authors
    Route::get("/dashboard/authors", "AuthorController@dashboard_index")->name("dashboard.authors.index");
    Route::get("/dashboard/authors/create", "AuthorController@dashboard_create")->name("dashboard.authors.create");
    Route::get("/dashboard/authors/{id}", "AuthorController@dashboard_single")->name("dashboard.authors.single");

    Route::post("/authors/update", "AuthorController@update")->name("authors.update");
    Route::post("/authors/store", "AuthorController@store")->name("authors.store");
    Route::post("/authors/remove", "AuthorController@remove")->name("authors.remove");
    Route::post("/authors/remove_multiple", "AuthorController@remove_multiple")->name("authors.remove_multiple");
    Route::post("/authors/image/drop", "AuthorController@drop_image")->name("authors.drop_image");

    //categories
    Route::get("/dashboard/categories", "CategoryController@dashboard_index")->name("dashboard.categories.index");
    Route::get("/dashboard/categories/create", "CategoryController@dashboard_create")->name("dashboard.categories.create");
    Route::get("/dashboard/categories/{id}", "CategoryController@dashboard_single")->name("dashboard.categories.single");

    Route::post("/categories/update", "CategoryController@update")->name("categories.update");
    Route::post("/categories/store", "CategoryController@store")->name("categories.store");
    Route::post("/categories/remove", "CategoryController@remove")->name("categories.remove");
    Route::post("/categories/remove_multiple", "CategoryController@remove_multiple")->name("categories.remove_multiple");
});
//---------------------------Dasboard end---------------------------

require __DIR__."/auth.php";