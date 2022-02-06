<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
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

Route::get('/', "App\Http\Controllers\BookController@index")->name("/");

Route::get(
    "contacto",
    "App\Http\Controllers\ContactoController@index"
)
    ->name("mail.index");

Route::post(
    "contacto",
    "App\Http\Controllers\ContactoController@send"
)
    ->name("mail.send");


Route::get('indexaut/{item}', "App\Http\Controllers\BookController@indexaut")->name("books.indexaut");
Route::get('indexcat/{item}', "App\Http\Controllers\BookController@indexcat")->name("books.indexcat");



Route::resource("books", BookController::class);
Route::resource("categories", CategoryController::class);
Route::resource("authors", AuthorController::class);