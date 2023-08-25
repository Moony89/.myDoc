<?php
session_start();

$title = "Mon médecin";
require_once '../INCLUDES/header.php';

require_once '../BDD/connectBDD.php';

$idPatient = $_SESSION['patient']['idPatient'];

$query = $connexion->prepare('SELECT nameD, surnameD, numAdeli, speciality, emailD FROM `Doctors` 
INNER JOIN `Patients` ON Doctors.idDoctor = Patients.idDoctor WHERE idPatient = :idPatient');

$query->execute(array(':idPatient' => $idPatient));

$myDoc = $query->fetch();

if ($myDoc) {
    $_SESSION['patient'] = [
        'nameD' => $myDoc['nameD'],
        'surnameD' => $myDoc['surnameD'],
        'numAdeli' => $myDoc['numAdeli'],
        'speciality' => $myDoc['speciality'],
        'emailD' => $myDoc['emailD'],
    ];
}

?>

<body>

    <?php
    require_once '../INCLUDES/menu.php';
    ?>

    <main class="dashboardP">

        <div class="bgBtnListPatient">
            <div class="btnListPatient">
                <button type="button" class="btn btnPatient btn-primary btn-lg"><a href="dashboardP.php">Mon compte</a></button>
                <button type="button" class="btn btnPatient btn-primary btn-lg"><a href="docsP.php">Mes documents</a></button>
                <button type="button" class="btn btnPatient btn-primary btn-lg"><a href="rdvsP.php">Mes RDVs</a></button>
                <button type="button" class="btn btnPatient btn-warning btn-lg"><a href="monDoc.php">Mon médecin traitant</a></button>
                <button type="button" class="btn btnPatient btn-primary btn-lg"><a href="update_profileP.php">Modifier mon profil</a></button>
                <button type="button" class="btn btnPatient btn-primary btn-lg"><a href="confirm_deleteP.php">Supprimer mon compte</a></button>
                <button type="button" class="btn btnPatient btn-primary btn-lg"><a href="../BDD/TRAITEMENT/traitement_deconnexion.php">Déconnexion</a></button>
            </div>

        </div>

        <div class="affListPatient">

            <p> Votre médecin traitant est le Docteur <span class="darkred"><?= $_SESSION['patient']['nameD'] . " " . $_SESSION['patient']['surnameD'] ?></span></p>
            <tr class="table-primary">
                <th scope="row">Informations complémentaires</th><br>
                <th scope="row">N° ADELI: </th>
                <td><?= $_SESSION['patient']['numAdeli']?></td><br>
            </tr>
            <tr class="table-light">
                <th scope="row">Spécialité: </th>
                <td><?= $_SESSION['patient']['speciality']?></td><br>
            </tr>
            <tr class="table-light">
                <th scope="row">Contact: </th>
                <td><?= $_SESSION['patient']['emailD']?></td><br>
            </tr>
        </div>

    </main>


    <?php
    require_once '../INCLUDES/footer.php';
    ?>

</body>