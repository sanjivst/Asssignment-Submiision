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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', "StudentController@index");
Route::post('/store', "StudentController@store");
Route::get('/teacher', "StudentController@show");
Route::get('/edit/{id}',"StudentController@edit") ;
Route::patch('/update/{id}',"StudentController@update") ;
Route::get('/delete/{id}',"StudentController@destroy") ;

