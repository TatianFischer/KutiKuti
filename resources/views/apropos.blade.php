@extends('layouts.master')

@section('content')
<div class="container content" id="apropos">
	<div class="row">
		<div class="col-md-12 desc1">
			<div class="col-md-4 paragraphe">
				<p id="apropos_paragraphe">Kutì Kutì est un jeu d'assemblage lumineux et interactif.<br> Par le montage de volumes abstraits et de circuits éléctroniques simples,<br> les enfants définissent la création de formes animales imaginaires</p>
			</div>
			<div class="col-md-4 cube">
				<img src="{{URL::asset('img/image1.jpg')}}" alt=""">
			</div>
			<div class="col-md-4 cube">
				<img src="{{URL::asset('img/image2.jpg')}}" alt=""">
			</div>

		</div>
	</div>

	<div class="row">
		<div class="col-md-12 desc2">
			<div class="col-md-6 paragraphe">
				<p id="apropos_paragraphe2">Kutì team : Pauline & Anna <br> Une passion commune : la réalisation de supports pédagogique ludiques et créatifs <br> Une vision : le design et la technologie comme vecteur d'interaction et d'apprentissage <br> Un engagement : l'amusement comme valeur centrale de leur création.<br> 
				Leur collaboration débute en octobre dernier au sein de Villette Makerz by WoMa et donne vie au jeu Kutì Kutì
				</p>
			</div>
			<div class="col-md-6 r-p" id="apropos_image">
				<img src="{{URL::asset('img/image3.jpg')}}" alt="">
			</div>
		</div>
	</div>

	<div class="col-xs-12 map">
		<iframe src="https://www.google.com/maps/embed?pb=!1m23!1m12!1m3!1d2623.139139853995!2d2.389043088540035!3d48.89368540395556!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m8!3e6!4m0!4m5!1s0x47e66dcb97e5f155%3A0xcf11e2120157690f!2sGalerie+de+la+Villette%2C+75019+Paris!3m2!1d48.8924398!2d2.3881942!5e0!3m2!1sfr!2sfr!4v1487684536483" frameborder="0" style="border:0" allowfullscreen></iframe>
	</div>
	
</div>



@endsection

@push('js')
   <script type="text/javascript" src="{{URL::asset('js/aleatoire.js')}}"></script> 
@endpush