<?php
session_start();

if ($_SESSION["USER"]["roles"] != "DOC") {
    header('location:./connexionD.php');
    exit();
} else {

    $titre = "Ajout d'un patient";
    
    require_once '../INCLUDES/header.php';
    require_once "../INCLUDES/menu.php";
?>

    <h2>Bonjour, Dr <span class="darkred"><?= $_SESSION["USER"]["name"] ?></span></h2>

    <form action="../BDD/TRAITEMENT/traitement_ajout_patient.php" method="POST">
        <fieldset>
            <legend>J'ajoute un patient:</legend>
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

            <button type="submit" class="btn btn-primary mt-4">Ajouter</button>
        </fieldset>
    </form>

<?php
    require_once "../INCLUDES/footer.php";
}
?>