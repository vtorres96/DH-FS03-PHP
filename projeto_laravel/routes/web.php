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

// listando cards
Route::get('/cards', 'CardsController@index');

// criando card
Route::post('/cards', 'CardsController@create');

// alterando card
Route::put('/cards/{id}', 'CardsController@edit');

// alterando card
Route::delete('/cards/{id}', 'CardsController@delete');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
