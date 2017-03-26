$(document).ready(function(){
	$('form').on('click', function(e){
		e.preventDefault();
		
		$(this).parents('tr').after('<tr id="confirmation"></tr>');
		
		$('<td colspan="5">Etes-vous sûr de vouloir supprimer cet élément ?</td>').appendTo('#confirmation');
		
		$('<td>').append($('<a>').addClass('btn btn-warning').text('Confirmer')).appendTo('#confirmation').on('click', function(){
			$(this).parents('tr').prev().find('form').submit();
		});
		
		$('<td>').append($('<a>').addClass('btn btn-info').text('Annuler')).appendTo('#confirmation').on('click', function(){
			$(this).parents('tr').remove();
		});
	})
})