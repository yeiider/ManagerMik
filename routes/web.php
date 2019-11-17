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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/','Index@index')->name('home');
Route::get('/SystemDataRoute/data/system','SystemDataRoute@getInfo')->name('SystemDataRoute');
Route::get('/SystemDataRoute/data/queue','SystemDataRoute@getSimpleQueue')->name('simpleQueue');
Route::get('/SystemDataRoute/data/route','SystemDataRoute@getDataRoute')->name('routes');
