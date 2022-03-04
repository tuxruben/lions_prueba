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
Route::get('salas_juntas', 'salas_juntasController@index');
Route::get('salas_juntas/{id}', 'salas_juntasController@show');
Route::post('salas_juntas', 'salas_juntasController@store');
Route::put('salas_juntas/{salas_junta}', 'salas_juntasController@update');
Route::delete('salas_juntas/{salas_junta}', 'salas_juntasController@destroy');