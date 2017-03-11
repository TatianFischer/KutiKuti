@extends('layouts.master')

@section('content')

<div class="container content" id="tutos">


<?php
$i = 1 ;
$nomber_videos = count($videos);
$nomber_lines = ceil($nomber_videos / 3) ;
?>
@foreach($videos as $video)


	@if ($i%3 == 1)
	<?php $nomber_video_in_the_line = 1; ?>
	<div class="row">
	
		<div class="col-md-12 poster_row">
	@endif

			<div class="col-sm-4 poster">
					<figure>
						<a href="{{route('tutos.show',[$video->id,$video->slug])}}">
							<img src="{{URL::asset('img/posters/'.$video->poster)}}" alt="">
							<figcaption>
								<p>étape #{{$video->step}} <br> {{$video->title}}</p>
							</figcaption>
						</a>
					</figure>
					
			</div>

	@if($i%3 == 0)

		<!-- fin de la div poster_row -->
		</div>

	<!-- fin de la div class row -->

	</div>
	@endif

<?php
$i++;
$nomber_video_in_the_line++;
?>

@endforeach


<!-- Pour finir la ligne -->
@while($i > $nomber_videos && $nomber_video_in_the_line != 4 )
		<div class="col-sm-4 poster">
			<figure>
				<img src="{{URL::asset('img/apropos/image'.($nomber_video_in_the_line-1).'.jpg')}}" alt="">
				<figcaption>
					<p></p>
				</figcaption>
			</figure>
					
		</div>
	@if($nomber_video_in_the_line == 3)
	<!-- fin de la div poster_row -->
		</div>

	<!-- fin de la div class row -->

	</div>
	@endif
	<?php $nomber_video_in_the_line++; ?>
@endwhile

</div>

@endsection

@push('js')
   <script type="text/javascript" src="{{URL::asset('js/aleatoire.js')}}"></script> 
@endpush