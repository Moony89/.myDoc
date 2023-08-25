<?php
$titre = 'Inscription Patient';
require_once '../INCLUDES/header.php';
require_once '../INCLUDES/menu.php';

?>

<body>

    <main class="mainFormP">
        <form class="formP" action="../BDD/TRAITEMENT/traitement_formP.php" method="POST">
            <fieldset>
                <legend>Inscription des patients:</legend>
                <div class="form-group">
                    <label for="nameP" class="form-label mt-4">Votre nom</label>
                    <input type="text" name="nameP" class="form-control bg-primary-subtle" id="nameP" placeholder="Nom">
                </div>
                <div class="form-group">
                    <label for="surnameP" class="form-label mt-4">Votre prénom</label>
                    <input type="text" name="surnameP" class="form-control bg-primary-subtle" id="surnameP" placeholder="Prénom">
                </div>
                <div class="form-group">
                    <label for="numSecuriteSociale" class="form-label mt-4">Votre numéro de Securité Sociale</label>
                    <input type="number" name="numSecuriteSociale" class="form-control bg-primary-subtle" id="numSecuriteSociale" placeholder="X XX XX XX XXX XXX">
                </div>
                <div class="form-group">
                    <label for="emailP" class="form-label mt-4">Votre Email</label>
                    <input type="email" name="emailP" class="form-control bg-primary-subtle" id="emailP" placeholder="Email">
                </div>

                <div class="form-group">
                    <label for="passwordP" class="form-label mt-4">Mot de passe</label>
                    <input type="password" name="passwordP" class="form-control bg-primary-subtle" id="passwordP" placeholder="Mot de passe">
                </div>
                <!--
            <div class="form-group">
            <label for="passP1" class="form-label mt-4">Mot de passe</label>
            <input type="password" name="passP1" class="form-control" id="passP1"  placeholder="Mot de passe">
            </div>
            <div class="form-group">
            <label for="passP2" class="form-label mt-4">Verifier votre mot de passe </label>
            <input type="password" name="passP2" class="form-control" id="passP2"  placeholder="Mot de passe">
            </div>
            -->
                <div class="form-group">
                    <label for="phone" class="form-label mt-4">Votre téléphone</label>
                    <input type="tel" name="phone" class="form-control bg-primary-subtle" id="phone" placeholder="XX XX XX XX XX">
                </div>
                <button type="submit" class="btn btn-primary">Envoyer</button>
            </fieldset>
        </form>
        <div class="imgFormP">
            <img src="../IMG/inscription_img.png" alt="Image d'un formulaire d'inscription.">
        </div>
    </main>


    <?php
    require '../INCLUDES/footer.php';
    ?>
</body>

</html>