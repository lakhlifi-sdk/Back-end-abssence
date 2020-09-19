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


/*Route::get('etudiants','Api\EtudiantController@index')->name('etudiants');
Route::get('etudiants/add','Api\EtudiantController@create');
Route::post('etudiants/add','Api\EtudiantController@store')->name('addEtudiant');
Route::get('etudiants/{id}/edit','Api\EtudiantController@edit');
Route::put('etudiants/{id}','Api\EtudiantController@update');
Route::delete('etudiants/{id}','Api\EtudiantController@destroy');

Route::get('profs','Api\ProfController@index')->name('profs');
Route::get('profs/add','Api\ProfController@create');
Route::post('profs/add','Api\ProfController@store')->name('addProf');
Route::get('profs/{id}/edit','Api\ProfController@edit');
Route::put('profs/{id}','Api\ProfController@update');
Route::delete('profs/{id}','Api\ProfController@destroy');

Route::get('seances','Api\SeanceController@index')->name('seances');


Route::post('absences/add','Api\AbsenceController@store')->name('addAbsence');


Route::get('filieres','Api\FiliereController@index');
Route::post('filieres/add','Api\FiliereController@add')->name('addFiliere');
Route::post('filieres/edit/{id}','Api\FiliereController@edit');
Route::post('filieres/delete/{id}','Api\FiliereController@delete');

Route::get('modules','Api\ModuleController@index');
Route::post('modules/add','Api\ModuleController@add')->name('addModule');
Route::post('modules/edit/{id}','Api\ModuleController@edit');
Route::post('modules/delete/{id}','Api\ModuleController@delete');

Route::get('semestres','Api\SemestreController@index');
Route::post('semestres/add','Api\SemestreController@add')->name('addSemestre');
Route::post('semestres/edit/{id}','Api\SemestreController@edit');
Route::post('semestres/delete/{id}','Api\SemestreController@delete');
*/