<?php
session_start();


if ($_SESSION["USER"]["roles"] != "DOC") {
    header('location:./connexionD.php');
    exit();

} else {

    $idPatient = $_GET['id'];

    require_once "../BDD/connect_BDD.php";

    $pdo = new PDO($attr, $user, $pass, $opts);

    $sql = " SELECT * FROM Patients WHERE Patients.idpatient = $idPatient ";

    $query = $pdo->query($sql);

    $patients = $query->fetch();

    $titre = 'Fiche Patient';

    $sql = "SELECT * FROM RDV WHERE $idPatient";

    $query = $pdo->query($sql);

    $rdv = $query->fetch();

    require_once '../INCLUDES/header.php';
    require_once "../INCLUDES/menu.php";

   
?>

    <body>

        <h2>Bonjour, Dr <span class="darkred"><?= $_SESSION["USER"]["name"] ?></span></h2>

        <h3 class="bg-primary text-light"><?=$patients["nameP"]?></h3>

        <div class="dashboardD">

        <?php require_once "../INCLUDES/menu_aside_medecin.php"; ?>

            <div class="infoP">

            <h5>Nom: <?=$patients["nameP"]?></h5>
            <h5>Prénom: <?=$patients["surnameP"]?></h5>
            <h5>N° de Sécurité Sociale: <?=$patients["numSecuriteSociale"]?></h5>
            <h5>Téléphone: <?=$patients["phone"]?></h5>
            <h5>Groupe Sanguin: <?=$patients["groupeSanguin"]?></h5>
            <h5>Dernier RDV le:  <?=$rdv["date"]?> à <?=$rdv["heure"]?> </h5>
            <a href="../BDD/TRAITEMENT/traitement_supp_patient.php?id=<?=$idPatient?>"><button type="submit" class="btn btn-danger mt-4">Supprimer le patient</button></a>
            <h4>Prendre RDV</h4>
            <form action="../BDD/TRAITEMENT/traitement_rdv.php?id=<?=$idPatient?>" method="POST">
                <label for="date">Date:</label>
                <input type="date" name="date" class="form-control">

                <label for="heure">Heure:</label>
                <input type="time" class="form-control" name="heure">

                <button type="submit" class="btn btn-primary mt-4">Envoyer</button>
            </form>

            <form action="traitement_rapport.php" method="POST">
                <fieldset>
                <label for="rapport"><h4>Rapport :</h4></label>
                </fieldset>
                <fieldset>
                <textarea name="rapport" id="" cols="110" rows="10"></textarea>
                </fieldset>
                <button type="submit" class="btn btn-primary mt-4">Enregistrer</button>
                
            </form>
            
            </div>
            
        </div>
    </body>

<?php
    require_once "../INCLUDES/footer.php";
}
?>


