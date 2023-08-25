<?php
$titre = 'Inscription';
require_once '../INCLUDES/header.php';
require_once '../INCLUDES/menu.php';

?>

<body>

    <h1>Je suis....</h1>


    <a class="btn btn-primary" href="formD.php" role="button">Un docteur</a>
    <a class="btn btn-primary disabled" href="formP.php" role="button">Un patient</a>

    <form action="../BDD/traitement_formP.php" method="POST">
        <fieldset>
            <legend>Inscription des patients:</legend>
            <div class="form-group">
                <label for="name" class="form-label mt-4">Votre nom</label>
                <input type="text" name="nameP" class="form-control" id="name" placeholder="Nom">
            </div>
            <div class="form-group">
                <label for="surname" class="form-label mt-4">Votre prénom</label>
                <input type="text" name="surnameP" class="form-control" id="surname" placeholder="Prénom">
            </div>
            <div class="form-group">
                <label for="numSecuriteSociale" class="form-label mt-4">Votre numéro de Sécurité Social</label>
                <input type="number" name="numSecuriteSociale" class="form-control" id="numSecuriteSociale" placeholder="X XX XX XX XXX XXX">
            </div>
            <div class="form-group">
                <label for="email" class="form-label mt-4">Votre Email</label>
                <input type="email" name="emailP" class="form-control" id="email" placeholder="Email">
            </div>
            <div class="form-group">
                <label for="pass1" class="form-label mt-4">Mot de passe</label>
                <input type="password" name="passP1" class="form-control" id="pass1" placeholder="Mot de passe">
            </div>
            <div class="form-group">
                <label for="pass2" class="form-label mt-4">Verifier votre mot de passe </label>
                <input type="password" name="passP2" class="form-control" id="pass2" placeholder="Mot de passe">
            </div>
            <div class="form-group">
                <label for="phoneP" class="form-label mt-4">Votre téléphone</label>
                <input type="tel" name="phoneP" class="form-control" id="phoneP" placeholder="XX XX XX XX XX">
            </div>
            <button type="submit" class="btn btn-primary mt-4">Envoyer</button>
        </fieldset>
    </form>
</body>

<?php

require_once '../INCLUDES/footer.php';

?>