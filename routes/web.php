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

Route::post('/pembagian', 'PembagianController@index');

Route::get('/fotohabis', function(){
	return view('fotohabis');
});

Route::get('/tunggujuri', function(){
	return view('tunggujuri');
});

Route::get('/skor', 'ScoringController@displayScore');
Route::post('/scoring', 'ScoringController@scoring');
Route::post('/newscore', 'ScoringController@update');

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

