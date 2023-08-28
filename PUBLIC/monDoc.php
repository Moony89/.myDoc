<?php
session_start();

require_once "../BDD/connect_BDD.php";

$pdo = new PDO($attr, $user, $pass, $opts);

$idPatient = $_SESSION['USER']['idPatient'];

$query = $pdo->prepare('SELECT nameD, surnameD, numAdeli, speciality, emailD FROM `Doctors` 
INNER JOIN `Patients` ON Doctors.idDoctor = Patients.idDoctor WHERE idPatient = :idPatient');

$query->execute(array(':idPatient' => $idPatient));

$myDoc = $query->fetch();

if ($myDoc) {
    $_SESSION['USER'] = [
        'nameD' => $myDoc['nameD'],
        'surnameD' => $myDoc['surnameD'],
        'numAdeli' => $myDoc['numAdeli'],
        'speciality' => $myDoc['speciality'],
        'emailD' => $myDoc['emailD'],
    ];

}
    require_once '../INCLUDES/header.php';
    require_once '../INCLUDES/menu.php';
    $titre = "Mon médecin";
    ?>
<body>
    <main class="dashboardP">

    <?php require_once "../INCLUDES/menu_aside_patient.php";?>

        <div class="affListPatient">

            <p> Votre médecin traitant est le Docteur <span class="darkred"><?= $_SESSION['USER']['nameD'] . " " . $_SESSION['USER']['surnameD'] ?></span></p>
            <tr class="table-primary">
                <th scope="row">Informations complémentaires</th><br>
                <th scope="row">N° ADELI: </th>
                <td><?= $_SESSION['USER']['numAdeli']?></td><br>
            </tr>
            <tr class="table-light">
                <th scope="row">Spécialité: </th>
                <td><?= $_SESSION['USER']['speciality']?></td><br>
            </tr>
            <tr class="table-light">
                <th scope="row">Contact: </th>
                <td><?= $_SESSION['USER']['emailD']?></td><br>
            </tr>
        </div>

    </main>


    <?php
    require_once '../INCLUDES/footer.php';
    ?>

</body>
