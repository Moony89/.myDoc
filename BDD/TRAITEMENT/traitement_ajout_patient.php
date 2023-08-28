<?php
session_start();

require_once "../security.php";

$nameP = protect($_POST['nameP']);
$surnameP = protect($_POST['surnameP']);
$numSecu = $_POST['numSecuriteSociale'];
$emailP = protect(filter_var($_POST['emailP'], FILTER_VALIDATE_EMAIL));

$token = bin2hex(random_bytes(16));

$idDoc = $_SESSION["USER"]["idDoctor"];

try{

require_once "../connect_BDD.php";
$pass = bin2hex(random_bytes(8));

$pdo = new PDO($attr, $user, $pass, $opts);

$sql = "INSERT INTO Patients (nameP, surnameP, numSecuriteSociale, emailP, passwordP, role, token, idDoctor ) VALUES (:nameP, :surnameP, :numSecuriteSociale, :emailP,  :passwordP, :patient, :token, :idDoc)";

    $query = $pdo->prepare($sql);

    $query->bindValue(':nameP', $nameP, PDO::PARAM_STR);
    $query->bindValue(':surnameP', $surnameP, PDO::PARAM_STR);
    $query->bindValue(':numSecuriteSociale', $numSecu, PDO::PARAM_STR);
    $query->bindValue(':emailP', $emailP, PDO::PARAM_STR);
    $query->bindValue(':passwordP', $pass, PDO::PARAM_STR);
    $query->bindValue(":patient","PATIENT", PDO::PARAM_STR);
    $query->bindValue(":token",$token, PDO::PARAM_STR);
    $query->bindValue(":idDoc",$idDoc, PDO::PARAM_STR);

    $query->execute();

    require_once "./mail.php";

    $adress = $emailP;
    $subject = "Bienvenue sur myDoc; ";
    $message = "Bonjour, $surnameP $nameP. 
        
    Bienvenue sur le site myDoc. Vous avez éte rajouté par votre medecin traitant.

    Vous pouvez vous connecter avec votre adresse mail et le mot de passe ci-dessous:<br>

                         Mot de passe: $pass";

    sendMail($adress, $subject, $message);

    header('location:../../PUBLIC/mesPatients.php');

}catch (PDOException $e) {
    throw new PDOException($e->getMessage(), (int)$e->getCode());
}