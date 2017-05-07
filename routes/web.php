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

Route::get('/soal', 'ScoringController@display');

Route::get('/kategori1/soala', 'DisplayController@display');
Route::get('/kategori1/soalb', 'DisplayController2@display');

Route::post('/pembagian', 'PembagianController@index');

Route::get('/next', 'DisplayController@next');
Route::get('/previous', 'DisplayController@previous');

Route::get('/fotohabis', function(){
	return view('fotohabis');
});

Route::get('/tunggujuri', function(){
	return view('tunggujuri');
});

Route::get('/skor', 'ScoringController@displayScore');
Route::get('/skor2', 'ScoringController2@displayScore');

Route::get('/upload', function(){
	return view('upload');
});

Route::group(['middleware' => ['guest']], function () {
  //ADMIN
  Route::get('frontdesk', 'AdminLoginController@index');
  Route::post('foauth', 'AdminLoginController@authenticate');
});


Route::group(['middleware' => ['admin']], function() {
  Route::post('uploading', 'FotoController@upload');
  Route::post('fologout', 'AdminLoginController@logout');
});

Route::post('scoring', 'ScoringController@scoring');
Route::post('scoring2', 'ScoringController2@scoring');