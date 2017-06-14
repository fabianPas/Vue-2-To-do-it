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

Route::get('/', 'TodoController@index')->name('index');
Route::post('/todo/create', 'TodoController@create')->name('create');
Route::post('/todo/{id}/check', 'TodoController@check')->name('check');
Route::post('/todo/{id}/delete', 'TodoController@delete')->name('delete');
Route::post('/todo/{id}/edit', 'TodoController@edit')->name('edit');
Route::get('/todo', 'TodoController@listTodos')->name('todos');
