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


Route::get('/', 'PageController@landing');
Route::get('/{user}', 'PageController@index');
Route::get('/admin/dashboard', 'PageController@admin');
Route::get('/admin/songs', 'DashboardController@loadSongs');
Route::get('/admin/dances', 'DashboardController@loadDances');
Route::get('/admin/infographics', 'DashboardController@loadInfoGraphics');
Route::get('/admin/view', 'DashboardController@getView');


Route::post('/submit/song', 'CriteriaController@submitSong');
Route::post('/submit/dance', 'CriteriaController@submitDance');
Route::post('/submit/infographic', 'CriteriaController@submitInfoGraphic');
Route::post('/admin/view/set', 'DashboardController@toggleView');