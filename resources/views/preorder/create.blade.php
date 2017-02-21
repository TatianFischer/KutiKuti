<link href='http://fonts.googleapis.com/css?family=Open Sans' rel='stylesheet' type='text/css'>
<link href="http://netdna.bootstrapcdn.com/font-awesome/3.0.2/css/font-awesome.css" rel="stylesheet">
<link rel="stylesheet" href="assets/css/preco.css">
<div id="content">
    <h1>Formulaire de précommande</h1>

    <form action=" " method="post" autocomplete="on">
        <p>
            <label for="lastname" class="icon-user"> Nom
                <span class="required">*</span>
            </label>
            <input type="text" name="lastname" id="lastname" required="required" placeholder="Votre nom" />
        </p>

        <p>
            <label for="firstname" class="icon-home">Prenom</label>
                <span class="required">*</span>
            <input type="text" name="firstname" id="firstname" placeholder="Votre prenom" />
        </p>
        
        <p>
            <label for="email" class="icon-home"> email</label>
                <span class="required">*</span>
            <input type="text" name="email" id="email" placeholder="Entrez votre email" required="required" />
        </p>
        
        <p>
            <label for="address" class="icon-envelope"> Adresse
                <span class="required">*</span>
            </label>
            <input type="text" name="address" id="address" placeholder="Entrez votre adresse" required="required" />
        </p>

        <p>
            <label for="cp" class="icon-envelope"> code postale
                <span class="required">*</span>
            </label>
            <input type="text" name="cp" id="cp" placeholder="Entrez votre code postal" required="required" />
        </p>
        
        <p class="indication">Les champs avec une
            <span class="required"> * </span>sont obligatoires</p>

        <input type="submit" value=" C'est parti ! " />

    </form>
</div>