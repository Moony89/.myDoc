<?php
session_start();
require_once "../connect_BDD.php";

$pdo = new PDO($attr, $user, $pass, $opts);


if (
    isset($_SESSION['USER']) && isset($_POST['valider_modif']) && !empty($_POST['nameP']) && !empty($_POST['surnameP'])
    && !empty($_POST['numSecuriteSociale']) && !empty($_POST['phone'])
) {

    $idPatient = $_SESSION['USER']['idPatient'];

    $nameP = strip_tags($_POST['nameP']);
    $surnameP = strip_tags($_POST['surnameP']);
    $numSecu = strip_tags($_POST['numSecuriteSociale']);
    $phone = strip_tags($_POST['phone']);

    try {

        $query = $pdo->prepare("UPDATE Patients SET `nameP`=:nameP, `surnameP`=:surnameP, `numSecuriteSociale`=:numSecuriteSociale, `phone`=:phone WHERE idPatient = $idPatient");

        $data = [
            ':nameP' => $nameP,
            ':surnameP' => $surnameP,
            ':numSecuriteSociale' => $numSecu,
            ':phone' => $phone
        ];


        $result = $query->execute($data);

    } catch (PDOException $e) {
        echo $e->getMessage();
    }


    if ($result) {


        $query = $pdo->prepare("SELECT nameP, surnameP, numSecuriteSociale, emailP, phone FROM Patients WHERE idPatient = $idPatient");

        $query->execute();

        $newInfosPatient = $query->fetch();

        $_SESSION["patient"] = [
            "nameP" => $newInfosPatient['nameP'],
            "surnameP" => $newInfosPatient['surnameP'],
            "numSecuriteSociale" => $newInfosPatient['numSecuriteSociale'],
            "emailP" => $newInfosPatient['emailP'],
            "phone" => $newInfosPatient['phone']
        ];

        header('location: ../../PUBLIC/dashboardP.php ');
    }
} else {
    echo '<div class="alert alert-dismissible alert-danger">
          <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
          <strong>Oh snap!</strong> <a href="#" class="alert-link">Change a few things up</a> and try submitting again.
        </div>Tous les champs sont requis. Merci de compléter correctement le formulaire.';
}
