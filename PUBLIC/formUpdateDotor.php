<?php
session_start();

if ($_SESSION["USER"]["roles"] != "DOC") {
    header('location:./connexionD.php');
    exit();

} else {
    $titre = "Modification profil";
    require_once '../INCLUDES/header.php';
    require_once "../INCLUDES/menu.php";

    $idDoc = $_SESSION["USER"]["idDoctor"];

    try{

    require_once "../BDD/connect_BDD.php";

    $pdo = new PDO($attr, $user, $pass, $opts);

    $sql = " SELECT * FROM Doctors WHERE Doctors.idDoctor = $idDoc ";

    $query = $pdo->query($sql);

    $doctor = $query->fetch();

    }catch (PDOException $e) {
        throw new PDOException($e->getMessage(), (int)$e->getCode());
    }
    ?>

<form class=".container-md" action="../BDD/TRAITEMENT/traitement_updateD.php" method="POST">
        <fieldset>
            <legend>Je modifie mon profil :</legend>
            <div class="form-group">
                <label for="nameD" class="form-label mt-4">Votre nom</label>
                <input type="text" name="nameD" class="form-control" id="nameD" value="<?=$doctor["nameD"]?>">
            </div>
            <div class="form-group">
                <label for="surnameD" class="form-label mt-4">Votre prénom</label>
                <input type="text" name="surnameD" class="form-control" id="surnameD" value="<?=$doctor["surnameD"]?>">
            </div>
            <div class="form-group">
                <label for="numAdeli" class="form-label mt-4">Votre numéro Adeli</label>
                <input type="text" name="numAdeli" class="form-control" id="numAdeli" value="<?=$doctor["numAdeli"]?>">
            </div>
            <div class="form-group">
                <label for="speciality" class="form-label mt-4">Spécialité</label>
                <input type="text" name="speciality" class="form-control" id="speciality" value="<?=$doctor["speciality"]?>">
            </div>
            <div class="form-group">
                <label for="numRue" class="form-label mt-4">Numéro de rue</label>
                <input type="text" name="numRue" class="form-control" id="numRue" value="<?=$doctor["numRue"]?>">
            </div>
            <div class="form-group">
                <label for="rue" class="form-label mt-4">Rue</label>
                <input type="text" name="rue" class="form-control" id="rue" value="<?=$doctor["rue"]?>">
            </div>
            <div class="form-group">
                <label for="codePostal" class="form-label mt-4">Code postal</label>
                <input type="text" name="codePostal" class="form-control" id="codePostal" value="<?=$doctor["codePostal"]?>">
            </div>
            <div class="form-group">
                <label for="ville" class="form-label mt-4">Ville</label>
                <input type="text" name="ville" class="form-control" id="ville" value="<?=$doctor["ville"]?>">
            </div>
            <div class="form-group">
                <label for="phone" class="form-label mt-4">Votre téléphone</label>
                <input type="text" name="phoneD" class="form-control" id="phone" value="<?=$doctor["phone"]?>">
            </div>
            <div class="form-group">
                <label for="emailD" class="form-label mt-4">Votre Email</label>
                <input type="email" name="emailD" class="form-control" id="email" value="<?=$doctor["emailD"]?>">
            </div>

            <button type="submit" class="btn btn-primary mt-4">Modifier</button>
        </fieldset>
    </form>



<?php
    require_once "../INCLUDES/footer.php";

} 
?>