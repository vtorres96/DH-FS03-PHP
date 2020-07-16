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

// home
Route::get('/', function(){
    return view('welcome');
});

// listando cards
Route::get('/cards', 'CardsController@index')->name('cards');

// criando card
Route::get('/cards/add', 'CardsController@add');
Route::post('/cards/add', 'CardsController@create');

// alterando card
Route::get('/cards/update/{id}', 'CardsController@edit');
Route::put('/cards/update/{id}', 'CardsController@update');

// excluindo card
Route::delete('/cards/remove/{id}', 'CardsController@delete');

// filtrando cards
Route::get('/cards/search', 'CardsController@search');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
