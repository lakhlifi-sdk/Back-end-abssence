<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/



Route::POST('login', 'Api\AuthController@login');
Route::POST('register', 'Api\AuthController@register');
Route::get('getAllUsers', 'Api\AuthController@getAllUsers');
Route::POST('saveUserInfo', 'Api\AuthController@saveUserInfo');

Route::post('logout', 'Api\AuthController@logout');



Route::get('seances','Api\SeanceController@index')->name('seances')->middleware('jwtAuth');

Route::POST('absence/add','Api\AbsenceController@store');


//Class CRUD
Route::post('class/create','Api\ClasseController@create')->middleware('jwtAuth');
Route::get('classes','Api\ClasseController@classes')->middleware('jwtAuth');

//Seance CRUD
Route::POST('seance/create','Api\SeanceController@create')->middleware('jwtAuth');
Route::POST('index','Api\SeanceController@index')->middleware('jwtAuth');

//Etudiant CRUDs
Route::POST('etudiant/create','Api\EtudiantController@create')/*->middleware('jwtAuth')*/;
Route::get('etudiants','Api\EtudiantController@etudiants')/*->middleware('jwtAuth')*/;






