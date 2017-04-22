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

Route::get('/home', 'HomeController@index');

Route::get('/soal', function(){
	return view('soal');
});

Route::get('/fotohabis', function(){
	return view('fotohabis');
});

Route::get('/tunggujuri', function(){
	return view('tunggujuri');
});

Route::get('/skor', function(){
	return view('skor');
});

Route::get('/upload', function(){
	return view('upload');
});