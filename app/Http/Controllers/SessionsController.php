<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
* 
*/
class SessionsController extends Controller
{
	
	function __construct()

	{

		$this->middleware('guest', ['except' => 'destroy']);

	}

	public function store(Request $request)
	{
		// Authentification
		// En cas de succès, la connexion est faite automatiquement
		if(! auth()->attempt(request(['pseudo', 'password']))){

			return back()->withErrors([
				'message' => 'Erreur lors de la connexion. Veuillez réessayer'
			]);

		} else {

			return redirect()->route('videos.index');
		}

		// Redirection
	}


	public function destroy()
	{
		auth()->logout();

		//session()->flash('success', 'Déconnexion réussie');

		return redirect()->route('accueil');
	}
}