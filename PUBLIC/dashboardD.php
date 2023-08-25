<?php
session_start();

if ($_SESSION["doctor"]["roles"] != "DOC") {
    header('location:./connexionD.php');
    exit();

} else {

    $idDoc = $_SESSION["doctor"]["idDoctor"];

    try{

    require_once "../BDD/connect_BDD.php";

    $pdo = new PDO($attr, $user, $pass, $opts);

    $sql = " SELECT * FROM Doctors WHERE Doctors.idDoctor = $idDoc ";

    $query = $pdo->query($sql);

    $doctor = $query->fetch();
    }catch (PDOException $e) {
        throw new PDOException($e->getMessage(), (int)$e->getCode());
    }

    $titre = 'Mon Compte';

    require_once '../INCLUDES/header.php';
    require_once "../INCLUDES/menu.php";
    ?>
    <div class="dashboardD">
    <div class="menu_dashboardD">

    <a href="./mesPatients.php"><button type="button" class="btn btn-primary btn-lg ">Mes Patients</button></a>
    <a href="./mesrdvD.php"><button type="button" class="btn btn-primary btn-lg">Mes RDV</button></a>
    <a href="./monCompteD.php"><button type="button" class="btn btn-primary btn-lg active">Mon Compte</button></a>
    <a href="./deconnexion.php"><button type="button" class="btn btn-primary btn-lg">Deconnexion</button></a>

    </div>

    <div class="infoP">

            <h5>Nom: <?=$doctor["nameD"]?></h5>
            <h5>Prénom: <?=$doctor["surnameD"]?></h5>
            <h5>N° ADELI: <?=$doctor["numAdeli"]?></h5>
            <h5>Spécialité: <?=$doctor["speciality"]?></h5>
            <h5>N°: <?=$doctor["numRue"]?></h5>
            <h5>RUE: <?=$doctor["rue"]?></h5>
            <h5>CODE POSTAL: <?=$doctor["codePostal"]?></h5>
            <h5>VILLE: <?=$doctor["ville"]?></h5>
            <h5>Téléphone: <?=$doctor["phone"]?></h5>
            
            <a href="./formUpdateDotor.php"><button type="button" class="btn btn-primary btn-lg ">Modifier</button></a>


    </div>

    <?php
    require_once "../INCLUDES/footer.php";

}  
?>