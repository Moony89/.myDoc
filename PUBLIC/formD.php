<?php
$titre = 'Inscription';
require_once '../INCLUDES/header.php';
require_once '../INCLUDES/menu.php';

?>

<body>


    <h1>Je suis....</h1>


    <a class="btn btn-primary disabled" href="formD.php" role="button">Un docteur</a>
    <a class="btn btn-primary" href="formP.php" role="button">Un patient</a>

    <form class=".container-md" action="../BDD/TRAITEMENT/traitement_formD.php" method="POST">
        <fieldset>
            <legend>Inscription des professionels de la medecine :</legend>
            <div class="form-group">
                <label for="name" class="form-label mt-4">Votre nom</label>
                <input type="text" name="nameD" class="form-control" id="name" placeholder="Nom">
            </div>
            <div class="form-group">
                <label for="surname" class="form-label mt-4">Votre prénom</label>
                <input type="text" name="surnameD" class="form-control" id="surname" placeholder="Prénom">
            </div>
            <div class="form-group">
                <label for="numAdeli" class="form-label mt-4">Votre numéro Adeli</label>
                <input type="number" name="numAdeli" class="form-control" id="numAdeli" placeholder="XX XX XXXX X">
            </div>
            <div class="form-group">
                <label for="email" class="form-label mt-4">Votre Email</label>
                <input type="email" name="emailD" class="form-control" id="email" placeholder="Email">
            </div>
            <div class="form-group">
                <label for="pass1" class="form-label mt-4">Mot de passe</label>
                <input type="password" name="passD1" class="form-control" id="pass1" placeholder="Mot de passe">
            </div>
            <div class="form-group">
                <label for="pass2" class="form-label mt-4">Verifier votre mot de passe </label>
                <input type="password" name="passD2" class="form-control" id="pass2" placeholder="Mot de passe">
            </div>
            <button type="submit" class="btn btn-primary mt-4">Submit</button>
        </fieldset>
    </form>
</body>
<?php

require_once '../INCLUDES/footer.php';

?>