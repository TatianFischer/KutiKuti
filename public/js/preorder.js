$(function(){
    // Affichage des détails
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



    // Code Poste
    // https://datanova.legroupe.laposte.fr/api/records/1.0/search/?dataset=laposte_hexasmal&q=94230&facet=nom_de_la_commune&facet=code_postal
    $('input[name="cp"]').on('keyup', function(){
        var min_length = 2;
        var keyword = $(this).val();
        
        if(keyword.length >= min_length){
            $.ajax({
                method: "GET",
                url: "https://datanova.legroupe.laposte.fr/api/records/1.0/search/?dataset=laposte_hexasmal&q="+$(this).val()+"&rows=5&facet=nom_de_la_commune&facet=code_postal",
                dataType: "json",

                success: function(data){
                    //On vide la liste à chaque fois que l'utilisateur tape sur une touche
                    $('.cp_list').empty().show();
                    // Récupération et affichage des données
                    $.each(data.records, function(index, value){
                        $('<li>')
                            .append($('<a>').addClass('cp_option').html('<span class="select_city">'+value.fields.nom_de_la_commune+'</span> (<span class="select_cp">'+value.fields.code_postal+'</span>)')
                                .on("click", function(){
                                $('input[name="city"]').val($(this).children('span.select_city').text());
                                $('input[name="cp"]').val($(this).children('span.select_cp').text());
                                $('.cp_list').hide();
                                }))
                            .appendTo('.cp_list');
                    })

                },

                error: function(result, status, error){
                    console.log("Réponse jQuery : " + result);
                    console.log("Statut de la requète : " + status);
                    console.log("Type d’erreur : " + error);
                    console.log(result);
                }
            })
        } else {
            $('.cp_list').hide();
        }

    })

    $('input[name="city"]').on('keyup', function(){
        var min_length = 2;
        var keyword = $(this).val();
        
        if(keyword.length >= min_length){
            $.ajax({
                method: "GET",
                url: "https://datanova.legroupe.laposte.fr/api/records/1.0/search/?dataset=laposte_hexasmal&q="+$(this).val()+"&rows=5&facet=nom_de_la_commune&facet=code_postal",
                dataType: "json",

                success: function(data){
                    //On vide la liste à chaque fois que l'utilisateur tape sur une touche
                    $('.city_list').empty().show();
                    // Récupération et affichage des données
                    $.each(data.records, function(index, value){
                        $('<li>')
                            .append($('<a>').addClass('ciy_option').html('<span class="select_city">'+value.fields.nom_de_la_commune+'</span> (<span class="select_cp">'+value.fields.code_postal+'</span>)')
                                .on("click", function(){
                                $('input[name="city"]').val($(this).children('span.select_city').text());
                                $('input[name="cp"]').val($(this).children('span.select_cp').text());
                                $('.city_list').hide();
                                }))
                            .appendTo('.city_list');
                    })

                },

                error: function(result, status, error){
                    console.log("Réponse jQuery : " + result);
                    console.log("Statut de la requète : " + status);
                    console.log("Type d’erreur : " + error);
                    console.log(result);
                }
            })
        } else {
            $('.city_list').hide();
        }

    })

})