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

Route::get('/', 'CarouselsController@accueil')->name('accueil');

Route::get('apropos', function() {
	return view('apropos');
})->name('apropos');

Route::get('tutos', 'TutosController@index')->name('tutos');

Route::get('tutos/{id}-{tutos}', 'TutosController@show')->where(['id' => '[0-9]'])->name('tutos.show');


/*-----------------------------------------
-------------------------------------------*/
Route::get('carousel', 'CarouselsController@index')->name('carousel.index');

// Formulaire ajout slide carousel
Route::get('carousel/create', 'CarouselsController@create')->name('carousel.create');

// Gestion du formulaire d'ajout
Route::post('carousel', 'CarouselsController@store')->name('carousel.store');

// Formulaire de modification d'un slide
Route::get('carousel/{carousel}/edit', 'CarouselsController@edit')->name('carousel.edit');

// Gestion du formulaire de modification
Route::put('carousel/{carousel}', 'CarouselsController@update')->name('carousel.update');

// Suppression d'un slide
Route::delete('carousel/{carousel}', 'CarouselsController@destroy')->name('carousel.destroy');

/*-----------------------------------------
-------------------------------------------*/
// Formulaire de précommande
Route::get('preorder/create/client', 'PreordersController@create')->name('preorders.create');

// Ajout du client à la session
Route::post('preorder/create/produits', 'PreordersController@createCustomer')->name('preorders.customer');

// Ajout des produits au panier
Route::post('preorder/create/panier', 'PreordersController@ajoutPanier')->name('preorders.panier');

// Décrémentation
Route::get('preorder/create/moins-{quantity}-{id}', 'PreordersController@decrementation')->name('preorders.decrementation');

// Incrémentation
Route::get('preorder/create/plus-{quantity}-{id}', 'PreordersController@incrementation')->name('preorders.incrementation');

// Ajout de la précommande à la base de donnée
Route::post('preorder', 'PreordersController@store')->name('preorders.store');

// Page admin avec la listes des précommandes
Route::get('preorder', 'PreordersController@index')->name('preorders.index')->middleware('auth');


// Page admin avec détail de la précommande
Route::get('preorder/{preorder}', 'PreordersController@show')->name('preorders.show')->middleware('auth')->middleware('ajax');

// Formulaire pour supprimer le précommande
Route::delete('preorder/{preorder}', 'PreordersController@destroy')->name('preorders.destroy')->middleware('auth');


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


/*------------------------------------------
--------------------------------------------*/
// Page admin avec la listes des produits
Route::get('produits', 'ProductsController@index')->name('products.index');

// Formulaire ajout des produits
Route::get('produits/create', 'ProductsController@create')->name('products.create');

// Gestion du formulaire d'ajout
Route::post('produits', 'ProductsController@store')->name('products.store');

// Formulaire de modification d'un produit
Route::get('produits/{product}/edit', 'ProductsController@edit')->name('products.edit');

// Gestion du formulaire de modification
Route::put('produits/{product}', 'ProductsController@update')->name('products.update');

// Suppression d'un produit
Route::delete('produits/{product}', 'ProductsController@destroy')->name('products.destroy');


/*------------------------------------------
--------------------------------------------*/
// Gestion du formulaire de connexion
Route::post('login', 'SessionsController@store')->name('login');

// Gestion de la déconnexion
Route::get('logout', 'SessionsController@destroy')->name('logout');

// Reset du password
Auth::routes();
