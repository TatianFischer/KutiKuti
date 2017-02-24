$(function(){
	$('#formRegister').on('submit', function(e){
		e.preventDefault();

		$.ajax({
            method: $(this).attr('method'),
            url: $(this).attr('action'),
            data: $(this).serialize(),
            dataType: "json",

        	success: function(data){
                console.log(data);
                if(data.type == 'danger' || data.type == 'warning' || data.type == 'success'){   
                    $('div.alert').show().attr("class", 'alert alert-'+data.type).text(data.message);
                	if(data.type == "success"){
                        $(this).hide().delay(10000);
                        window.location.reload();
                    }
                }
            },

            error: function(result, status, error){
                console.log("Réponse jQuery : " + result);
                console.log("Statut de la requète : " + status);
                console.log("Type d’erreur : " + error);
                console.log(result);
            }
        });
	})

});