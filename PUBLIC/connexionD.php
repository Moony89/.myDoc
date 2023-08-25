<?php
$titre = 'Connexion';
require_once '../INCLUDES/header.php';
require_once '../INCLUDES/menu.php';

?>
<body>
    
<h1>Je suis....</h1>


<a class="btn btn-primary disabled" href="connexionD.php" role="button">Un docteur</a>
<a class="btn btn-primary" href="connexionP.php" role="button">Un patient</a>

<form action="../BDD/TRAITEMENT/traitement_connexionD.php" method="POST">
    <fieldset>
        <legend>Connexion des professionels de la medecine :</legend>


        <div class="form-group">
            <label for="numAdeli" class="form-label mt-4">Votre numéro Adeli</label>
            <input type="number" name="numAdeli" class="form-control" id="numAdeli" placeholder="X XX XX XX XXX XXX">
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