@extends('layouts.master')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12 desc1">
			<div class="col-md-4 paragraphe">
				<p>KutìKutì est un jeu d'assemblage lumineux et interactif. Par le montage de volumes abstraits et de circuits éléctroniques simples, les enfants définissent la création de formes animales imaginaires</p>
			</div>
			<div class="col-md-4">
				<img src="{{URL::asset('img/image1.jpg')}}" alt=""">
			</div>
			<div class="col-md-4">
				<img src="{{URL::asset('img/image2.jpg')}}" alt=""">
			</div>

		</div>
	</div>

	<div class="row">
		<div class="col-md-12 desc2">
			<div class="col-md-6 paragraphe">
				<p>Kutì team : Pauline & Anna // Une passion commune : la réalisation de supports pédagogique ludiques et créatifs // Une vision : le design et la technologie comme vecteur d'interaction et d'apprentissage // Un engagement : l'amusement comme valeur centrale de leur création. 
				Leur collaboration débute en octobre dernier au sein de Villette Makerz by WoMa et donne vie au jeu kutìKutì
				</p>
			</div>
			<div class="col-md-6">
				<img src="{{URL::asset('img/image3.jpg')}}" alt=""">
			</div>
		</div>
	</div>
</div>



@endsection