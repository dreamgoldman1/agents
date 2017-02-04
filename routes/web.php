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

/*
 * Match y asignaciones
 */
Route::get('/', 'Match\MatchController@index');

Route::get('/hacer-match', 'Match\MatchController@index');

Route::post('/match', 'Match\MatchController@match');

Route::get('/asignaciones', 'Asignacion\AsignacionController@asignaciones');

/*
 * Csv tratamiento
 */
Route::get('/cargar-csv', 'Csv\CsvController@cargarCsv');

Route::post('/cargado', 'Csv\CsvController@cargado');

Route::get('/ver-csv', 'Csv\CsvController@verCsv');