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
		$this->middleware('ajax', ['only' => 'store']);

	}

	public function store(Request $request)
	{
		// Authentification
		// En cas de succès, la connexion est faite automatiquement
		if(! auth()->attempt(request(['pseudo', 'password']))){

			$message = [
				'type' => 'danger',
				'message' => 'Erreur lors de la connexion. Veuillez réessayer'
			];

		} else {

			$message = [
				'type' => 'success',
				'message' => 'Bonne journée !'
			];
		}

		return json_encode($message);
	}


	public function destroy()
	{
		auth()->logout();

		//session()->flash('success', 'Déconnexion réussie');

		return redirect()->route('accueil');
	}
}