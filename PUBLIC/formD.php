<?php
$title = 'Inscription professionnel';
require_once '../INCLUDES/header.php';
?>

<body>

    <?php
    require '../INCLUDES/menu.php';
    require '../INCLUDES/footer.php';

    ?>

    <main class="mainFormD">
        <form class="formD" action="../BDD/traitementDocteur.php" method="POST">
            <fieldset>
                <legend>Inscription professionnels de santé :</legend>
                <div class="form-group">
                    <label for="name" class="form-label mt-1">Votre nom</label>
                    <input type="text" name="name" class="form-control bg-primary-subtle" id="name" placeholder="Nom">
                </div>
                <div class="form-group">
                    <label for="surname" class="form-label mt-1">Votre prénom</label>
                    <input type="text" name="surname" class="form-control bg-primary-subtle" id="surname" placeholder="Prénom">
                </div>
                <div class="form-group">
                    <label for="numAdeli" class="form-label mt-1">Votre numéro Adeli</label>
                    <input type="number" name="numAdeli" class="form-control bg-primary-subtle" id="numAdeli" placeholder="X XX XX XX XXX XXX">
                </div>
                <div class="form-group">
                    <label for="email" class="form-label mt-1">Votre Email</label>
                    <input type="email" name="email" class="form-control bg-primary-subtle" id="email" placeholder="Email">
                </div>
                <div class="form-group">
                    <label for="pass1" class="form-label mt-1">Mot de passe</label>
                    <input type="password" name="pass1" class="form-control bg-primary-subtle" id="pass1" placeholder="Mot de passe">
                </div>
                <div class="form-group">
                    <label for="pass2" class="form-label mt-1">Verifier votre mot de passe </label>
                    <input type="password" name="pass2" class="form-control bg-primary-subtle" id="pass2" placeholder="Mot de passe">
                </div>
                <div class="form-group">
                    <label for="phone" class="form-label mt-1">Votre téléphone</label>
                    <input type="tel" name="phone" class="form-control bg-primary-subtle" id="phone" placeholder="XX XX XX XX XX">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </fieldset>
        </form>
        <div class="imgFormD">
            <img src="../IMG/inscription_img.png" alt="Image d'un formulaire d'inscription.">
        </div>

    </main>




</body>

</html>