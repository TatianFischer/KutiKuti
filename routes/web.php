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
    return view('accueil');
})->name('accueil');

Route::get('/apropos');

Route::get('/tutos');


/*-----------------------------------------
-------------------------------------------*/
Route::get('/preorder', 'PreorderController@index');

// Envoi du formulaire
Route::post('/preorder', 'PreorderController@store');

/*------------------------------------------
--------------------------------------------*/
// Page admin avec la listes des vidéos
Route::get('/videos', 'VideosController@index')->name('videos.index');

// Page admin ajout d'une vidéo
Route::get('/videos/create', 'VideosController@create')->name('videos.create')->name('videos.create');

// Modification des vidéos
Route::get('/videos/{video}/edit', 'VideosController@edit')->name('videos.edit');

// Suppression d'une vidéo
Route::delete('/videos/{video}', 'VideosController@destroy')->name('videos.destroy');