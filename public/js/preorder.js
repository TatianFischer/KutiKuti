$(function(){
    // Affichage des détails de précommande dans l'admin
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


    // Formulaire en plusieurs étapes
    var steps = $('#form_preco fieldset');
    var count = steps.length;
    $('#save_preco').hide();
    $('#form_preco').before('<ul id="steps" class="nav nav-pills nav-justified"></ul>');

    steps.each(function(i){
        $(this).wrap('<div id="step'+i+'"></div>');
        $(this).append('<p id="step'+i+'commands"></p>'); // Ajout des commandes

        // 2
        var name = $(this).find("legend").html();
        $("<li>").attr('id', "stepDesc" + i)
            .append($('<span>').text("Etape " + (i + 1) + " " + name))
                .appendTo("#steps");
        

        if(i == 0){
            createNextButton(i);
            selectStep(i);
        } else if(i == count-1){
            $('#step'+i).hide();
            createPrevButton(i);
        } else {
            $('#step'+i).hide();
            createPrevButton(i);
            createNextButton(i);
        }
    })

    function createPrevButton(i) {
        var stepName = "step" + i;
        $("#" + stepName + "commands").append("<a href='#' id='" + stepName + "Prev' class='prev btn btn-primary'><span class='glyphicon glyphicon-chevron-left'> Précédent</a>");

        $("#" + stepName + "Prev").on("click", function(e) {
            $("#" + stepName).hide();
            $("#step" + (i - 1)).show();
            $('#save_preco').hide();
            selectStep(i - 1);
        });
    }

    function createNextButton(i) {
        var stepName = "step" + i;
        $("#" + stepName + "commands").append("<a href='#' id='" + stepName + "Next' class='next btn btn-primary'>Suivant <span class='glyphicon glyphicon-chevron-right'></a>");

        $("#" + stepName + "Next").on("click", function(e) {
            $("#" + stepName).hide();
            $("#step" + (i + 1)).show();
            if (i + 2 == count)
                $('#save_preco').show();
            selectStep(i + 1);
        });
    }

    function selectStep(i) {
        $("#steps li").removeClass("current");
        $("#stepDesc" + i).addClass("current");
    }







    // Code Postal
    // https://datanova.legroupe.laposte.fr/api/records/1.0/search/?dataset=laposte_hexasmal&q=94230&facet=nom_de_la_commune&facet=code_postal
    $('input[name="cp"]').on('keyup', function(){
        var min_length = 2;
        var keyword = $(this).val();
        
        if(keyword.length >= min_length){
            $.ajax({
                method: "GET",
                url: "https://datanova.legroupe.laposte.fr/api/records/1.0/search/?dataset=laposte_hexasmal&sort=nom_de_la_commune&row=45&q="+$(this).val()+"&facet=nom_de_la_commune&facet=code_postal",
                dataType: "json",

                success: function(data){
                    //On vide la liste à chaque fois que l'utilisateur tape sur une touche
                    $('.cp_list').empty().show();
                    // Récupération et affichage des données
                    $.each(data.records, function(index, value){
                        $('<li>')
                            .append($('<a>').addClass('cp_option').html('<span class="select_city">'+value.fields.nom_de_la_commune.toLowerCase()+'</span> (<span class="select_cp">'+value.fields.code_postal+'</span>)')
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

    $('input[name="cp"]').on('blur', function(){
        $('.cp_list').hide();
    })

    $('input[name="city"]').on('keyup', function(){
        var min_length = 2;
        var keyword = $(this).val();
        
        if(keyword.length >= min_length){
            $.ajax({
                method: "GET",
                url: "https://datanova.legroupe.laposte.fr/api/records/1.0/search/?dataset=laposte_hexasmal&sort=nom_de_la_commune&row=45&q="+$(this).val()+"&facet=nom_de_la_commune&facet=code_postal",
                dataType: "json",

                success: function(data){
                    //On vide la liste à chaque fois que l'utilisateur tape sur une touche
                    $('.city_list').empty().show();
                    // Récupération et affichage des données
                    $.each(data.records, function(index, value){
                        $('<li>')
                            .append($('<a>').addClass('city_option').html('<span class="select_city">'+value.fields.nom_de_la_commune+'</span> (<span class="select_cp">'+value.fields.code_postal+'</span>)')
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

    $('input[name="city"]').on('blur', function(){
        $('.city_list').hide();
    })

})