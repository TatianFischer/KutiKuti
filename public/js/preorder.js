$(function(){
    //-----------------------------------------------------------------
    // Affichage des détails de précommande dans l'admin
    //-----------------------------------------------------------------

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





    //-----------------------------------------------------------------
    // Formulaire en plusieurs étapes
    //-----------------------------------------------------------------

    var steps = $('.form_preco');
    var count = steps.length;

    steps.each(function(i){
        $(this).addClass("step"+i);
        $(this).append('<p id="step'+i+'commands"></p>'); // Ajout des commandes
        

        if(i == 0){
            createNextButton(i);
            selectStep(i);
        } else if(i == count-1){
            createPrevButton(i);
            createSubmitButton(i);
        } else {
            createPrevButton(i);
            createNextButton(i);
        }
    })




    function createPrevButton(i) {
        var stepName = 'step' + i;
        $('#' + stepName + 'commands').append('<a id="' + stepName + 'Prev" class="prev btn btn-primary"><span class="glyphicon glyphicon-chevron-left"></span> Précédent</a>');

        $('#' + stepName + 'Prev').on("click", function(e) {
            $('.' + stepName).hide();
            $('.step' + (i - 1)).show();
            selectStep(i - 1);
        });
    }





    function createNextButton(i) {
        var stepName = "step" + i;
        $("#" + stepName + "commands")
            .append('<button type="submit" id="' + stepName + 'Next" class="next btn btn-primary">Suivant <span class="glyphicon glyphicon-chevron-right"></button>');

        $(".form_preco:eq(" + i + ")").on("submit", function(e) {
            $('div.alert.alert-danger').remove();
            selectStep(i + 1);
            
            if(i == 0){ // Vérification des données

                isFormValid = verificationChamps();

                if(isFormValid == false){
                    $('<div>').addClass('alert alert-danger')
                        .append($('<p>').text('Veuillez corriger les erreurs'))
                    .prependTo('fieldset');
                    e.preventDefault();
                }

            } else if(i == 1){
                isCheckboxValid = true;
                n = $('label.active').length;
                if(n == 0){
                    isCheckboxValid = false;
                }
                
                //isCheckboxValid = verificationCheckbox();

                if(isCheckboxValid == false){
                    e.preventDefault();
                    $('<div>').addClass('alert alert-danger')
                        .append($('<p>').text('Veuillez selectionner au moins un produit'))
                    .prependTo('fieldset');
                }
            }
        });
    }


    function createSubmitButton(i){
        var stepName = "step" + i;
        $("#" + stepName + "commands")
            .append('<input type="submit" id="save_preco" value="C\'est parti !" class="btn btn-success">');
    }

    function selectStep(i) {
        $("#steps li").removeClass("current");
        $("#stepDesc" + i).addClass("current");
    }


    function verificationChamps(){
        $('p.alert.alert-danger').remove();
        formValid = true;

        var textReg = new RegExp(/[a-zéèçùàïîâ_ -]*/, 'i');

        var firstname = $('#firstname').val().trim();
        
        if(firstname.length < 2){
            formValid = false;

            errorMessage('firstname', 'N\'oubliez pas de saisir votre prénom');

        } else if(firstname.length > 191){

            errorMessage('firstname', 'Votre prénom ne doit pas faire plus de 191 caractères');

        } else if (!textReg.test(firstname)){
            formValid = false;
            
            errorMessage('firstname', 'Seules les lettres, accentuées ou non, sont acceptées');
        }



        var lastname = $('#lastname').val().trim();
        if(lastname.length < 2 ){
            formValid = false;

            errorMessage('lastname', 'N\'oubliez pas de saisir votre nom');

        } else if(firstname.length > 191){

            errorMessage('lastname', 'Votre nom ne doit pas faire plus de 191 caractères');

        } else if (!textReg.test(lastname)){
            formValid = false;
            
            errorMessage('lastname', 'Seules les lettres, accentuées ou non, sont acceptées');
        }



        var email = $('#email').val().trim();

        var emailReg = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/, 'i');

        if(email.length < 2){

            formValid = false;
            errorMessage('email', 'Veuillez entrer une adresse email');

        } else if (!emailReg.test(email)){

            formValid = false;
            errorMessage('email', 'Veuillez entrer une adresse email valide');
        }



        var address = $('#address').val().trim();

        var textNumReg = new RegExp(/[0-9a-zéèçùàïîâ_ -]*/, 'i');

        if(address.length < 10){

            formValid = false;

            errorMessage("address", "Veuillez entrer une adresse");

        } else if(!textNumReg.test(address)){

            formValid = false;

            errorMessage("address", "Veuillez entrer une adresse correcte");

        }



        var cp = $('#cp').val().trim();

        var cpReg = new RegExp(/[0-9]{5}/, 'i');

        if(cp.length < 2){

            formValid = false;

            errorMessage('cp', 'Veuillez entrer un code postal');

        } else if(!cpReg.test(cp)) {
            formValid = false;

            errorMessage('cp', 'Veuillez entrer un code postal valide');     
        }


        var city = $('#city').val().trim();

        var cityReg = new RegExp(/[^0-9][a-zéèçùàïîâ_ -]*/, 'i')

        if(city.length < 2){
            formValid = false;
            errorMessage('city', 'Veuillez entrer une ville');
            console.log('hello1');

        } else if(city.length > 191){

            errorMessage('city', 'Le nom de la ville ne doit pas faire plus de 191 cractères');
            console.log('hello2');

        } else if(!cityReg.test(city)) {
            formValid = false;
            errorMessage('city', 'Veuillez entrer une ville qui existe');
            console.log('hello3');
        }

        if(!formValid){
            return false;
        } else {
            return true;
        }
    }

    function errorMessage(selector, msg){
        $("<p>")
                .addClass('alert alert-danger')
                .text(msg)
                .appendTo($('#'+selector).parent().parent());
    }





/*    function productsToSession(){
        console.log('entrée');
        $('label.active').each(function(index, product){
            id_produit = $(this).find('input').val().trim();
            if(typeof products['id_produit'] == "undefined" || products['id_produit'].indexOf(id_produit) == -1){
                if(typeof products['id_produit'] != "undefined"){
                    var i = products['id_produit'].length;
                } else {
                    var i = 0;
                    products['id_produit'] = [];
                    products['quantity'] = [];
                }
                products['id_produit'][i] = id_produit;
                products['quantity'][i] = 1;
            } else {
                console.log('Erreur de création de panier');
            }
        });
        console.log(products);
        productsJSON = JSON.stringify(products);

        $.ajax({
            url : urlPanier,
            type : 'get',
            data : products,
            dataType : 'json'
        })
        .done(function(panier){
            console.log(panier);
        })  
    }*/





    //-----------------------------------------------------------------
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

    $('input[name="cp"]').parents().on('click', function(){
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
                            .append($('<a>').addClass('city_option').html('<span class="select_city">'+value.fields.nom_de_la_commune.toLowerCase()+'</span> (<span class="select_cp">'+value.fields.code_postal+'</span>)')
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

    $('input[name="city"]').parents().on('click', function(){
        $('.city_list').hide();
    })

})