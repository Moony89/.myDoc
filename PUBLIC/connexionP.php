<?php
$titre = 'Connexion';
require_once '../INCLUDES/header.php';
require_once '../INCLUDES/menu.php';

?>

<body>

<h1>Je suis....</h1>


<a class="btn btn-primary " href="connexionD.php" role="button">Un docteur</a>
<a class="btn btn-primary disabled" href="connexionP.php" role="button">Un patient</a>

    <form action="../BDD/traitementDocteur.php" method="POST">
        <fieldset>
            <legend>Connexion des patients :</legend>


            <div class="form-group">
                <label for="exampleInputEmail1" class="form-label mt-4">Votre Email</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
            </div>
            <div class="form-group">
                <label for="pass1" class="form-label mt-4">Mot de passe</label>
                <input type="password" name="pass1" class="form-control" id="pass1" placeholder="Mot de passe">
            </div>

            <button type="submit" class="btn btn-primary m-4">Connexion</button>
        </fieldset>
    </form>
</body>
<?php

require_once '../INCLUDES/footer.php';
?>