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

Route::get('apropos', function() {
	return view('apropos');
})->name('apropos');

Route::get('tutos', 'TutosController@index')->name('tutos');

/*-----------------------------------------
-------------------------------------------*/
// Formulaire de précommande
Route::get('preorder/create', 'PreordersController@create');

// Ajout de la précommande à la base de donnée
Route::post('preorder', 'PreordersController@store');

// Page admin avec la listes des précommandes
Route::get('preorder', 'PreordersController@index');

// Page admin avec détail de la précommande
Route::get('preorder/show', function () {
    return view('preorder.show');
});

// Formulaire pour supprimer le précommande
Route::delete('preorder/{preorder}', 'PreordersController@destroy');


/*------------------------------------------
--------------------------------------------*/
// Page admin avec la listes des vidéos
Route::get('videos', 'VideosController@index')->name('videos.index');

// Page admin : formulaire d'ajout d'une vidéo
Route::get('videos/create', 'VideosController@create')->name('videos.create');

//Envoi du formulaire d'ajout
Route::post('videos', 'VideosController@store')->name('videos.store');

// formulaire de modification des vidéos
Route::get('videos/{video}/edit', 'VideosController@edit')->name('videos.edit');

// Envoi du formulaire de modification
Route::put('videos/{video}', 'VideosController@update')->name('videos.update');

// Suppression d'une vidéo
Route::delete('videos/{video}', 'VideosController@destroy')->name('videos.destroy');
