$(function(){
	$('.details').on('submit', function(e){
		e.preventDefault();
		
		$.ajax({
            method: $(this).attr('method'),
            url: $(this).attr('action'),
            data: $(this).serialize(),
            dataType: "json",

        	success: function(data){
                // Vider les précédentes données
        		$('#customer tbody').empty();
                $('#products_details tbody').empty();

        		$('h2').show();

                $('#customer').show();

                $('<tr>')
                	.append($('<td>').text(data["0"].lastname))
                	.append($('<td>').text(data["0"].firstname))
                	.append($('<td>').text(data["0"].email))
                	.append($('<td>').text(data["0"].address))
                	.append($('<td>').text(data["0"].cp))
                	.append($('<td>').text(data["0"].city))
                		.appendTo("#customer tbody");

                $('#products_details').show();

                for(i = 1; i < data.length; i++){
                	$('<tr>')
                	.append($('<td>').text(data[i].modele))
                	.append($('<td>').text(data[i].couleur))
                	.append($('<td>').text(data[i].quantity))
                	.append($('<td>').text(data[i].price+" €"))                	
                	.append($('<td>').text((data[i].price*data[i].quantity)+" €"))                	
                		.appendTo("#products_details");
                }

                $('<tr>')
                    .append($('<td colspan=3>').text('Montant total'))
                    .append($('<td colspan=2>').text(data["0"].total+" €"))
                        .appendTo("#products_details");
                
            },

            error: function(result, status, error){
                console.log("Réponse jQuery : " + result);
                console.log("Statut de la requète : " + status);
                console.log("Type d’erreur : " + error);
                console.log(result);
            }
		})
	})
})