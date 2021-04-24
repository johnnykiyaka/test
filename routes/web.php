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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::resource('passangers', 'PassangerController');

Route::resource('depatures', 'DepatureController');

Route::resource('frightgos', 'frightgoController');

Route::resource('mOVIES', 'MOVIESController');

Route::resource('series', 'SeriesController');