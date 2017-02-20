<!-- @extends('layouts.master') -->

<!-- @section('content') -->
<h1>Gestion des vidéos</h1>
<h2>Listes des vidéos</h2>

<table border="1">
	<thead>
		<th>Titre</th>
		<th>Slug</th>
		<th>Tag</th>
		<th colspan="2">Options</th>
	</thead>

	<tbody border="1">
		
		<!-- @foreach($videos as $video) -->

			<tr>

				<!-- @foreach($video as $key => $valeur) -->

					<td> {{ $valeur }} </td>


				<!-- @endforeach -->

				<td><a href="">Détails</a></td>

				<td><a href="">Suppression</a></td>

			</tr>

			<!-- @endforeach -->

	</tbody>

</table>


<h2>Modification ou Ajout</h2>

<form action="" method="">
	 
	 {{ csrf_field() }}

	<input type="text" name="id" hidden>

	<div class="form-group">
		<label for="title">Titre :</label>
		<input type="text" class="form-control" id="title" name="title">
	</div>

	<div class="form-group">
		<label for="slug">Slug :</label>
		<input type="text" class="form-control" id="slug" name="slug">
	</div>

	<div class="form-group">
		<label for="tag">Tag :</label>
		<input type="text" class="form-group" id="tag" name="tag">
	</div>
	
	<div class="form-group">
		<input type="submit" value="Validation">
	</div>
</form>

<!-- @endsection -->