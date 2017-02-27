@extends('layouts.master')

@section('content')

<div class="container" id="tutos_videos">

	<div class="row">
		<div class="col-xs-12">
			<div class="tutos2">
				<iframe src="https://player.vimeo.com/video/{{$video->tag}}?title=0&byline=0&portrait=0" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
			</div>
		</div>
	</div>

</div>

@endsection