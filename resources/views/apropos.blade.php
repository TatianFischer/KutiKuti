@extends('layouts.master')

@section('content')
<div class="container content" id="apropos">
	<div class="row">

		<div class="col-md-12 desc1">
			<div class="col-md-3 r-p" id="apropos_paragraphe">
				<div>
					<p>
						Kutì Kutì est un jeu d'assemblage lumineux et interactif.<br> Par le montage de volumes abstraits et de circuits éléctroniques simples,<br> les enfants définissent la création de formes animales imaginaires
					</p>
				</div>
			</div>

			<div class="col-md-3 col-md-offset-1 img1 r-p">
				<img src="{{URL::asset('img/apropos/image1.jpg')}}" alt="Elements Kutì Kutì sur fond bleu clair">
			</div>

			<div class="col-md-3 col-md-offset-1 img1 r-p">
				<img src="{{URL::asset('img/apropos/image2.jpg')}}" alt="Elephant en éléments Kutì Kutì">
			</div>
		</div>

		<div class="col-md-12 desc1_slider">
			<div class="col-sm-5 r-p" id="apropos_paragraphe">
				<div>
					<p>
						Kutì Kutì est un jeu d'assemblage lumineux et interactif.<br> Par le montage de volumes abstraits et de circuits éléctroniques simples,<br> les enfants définissent la création de formes animales imaginaires
					</p>
				</div>
			</div>
			<div class="col-sm-5 col-sm-offset-2 carousel slide" data-ride="carousel">
				<div class="carousel-inner" role="listbox">
					<div class="img1 r-p item active">
						<img src="{{URL::asset('img/apropos/image1.jpg')}}" alt="Elements Kutì Kutì sur fond bleu clair">
					</div>

					<div class="img1 r-p item">
						<img src="{{URL::asset('img/apropos/image2.jpg')}}" alt="Elephant en éléments Kutì Kutì">
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="row">

		<div class="col-md-12 desc2">

			<div class="col-md-5 col-md-offset-1 col-xs-12 paragraphe">
				<p id="apropos_paragraphe2">Kutì team : Pauline & Anna // Une passion commune : la réalisation de supports pédagogiques ludiques et créatifs // Une vision : le design et la technologie comme vecteur d'interaction et d'apprentissage // Un engagement : l'amusement comme valeur centrale de leur création.<br> 
				Leur collaboration débute en octobre dernier au sein de Villette Makerz by WoMa et donne vie au jeu Kutì Kutì.
				</p>
			</div>

			<div class="col-md-5 r-p" id="apropos_image">
				<div class="col-md-11 col-md-offset-1 r-p">
					<img src="{{URL::asset('img/apropos/image3.jpg')}}" alt="Pauline et Anna">
				</div>
			</div>

		</div>
	</div>
	
	<div class="row">
		<div class="col-md-11 map">
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2623.208520037738!2d2.3881013999999996!3d48.8923631!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e66dcb97a6455b%3A0x85473c5c7cdfef9f!2sVillette+makerz+by+woma!5e0!3m2!1sfr!2sus!4v1489251241431" frameborder="0" style="border:0" allowfullscreen></iframe>
		</div>
	</div>
		

<!-- fin de la div class container -->	
</div>



@endsection

@push('js')
   <script type="text/javascript" src="{{URL::asset('js/aleatoire.js')}}"></script>
   <script type="text/javascript" src="{{URL::asset('js/responsive.js')}}"></script> 
@endpush