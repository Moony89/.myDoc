<?php
session_start();
require_once "../security.php";

$nameP = protect($_POST['nameP']);
$surnameP = protect($_POST['surnameP']);
$numSecu = $_POST['numSecuriteSociale'];
$emailP = protect(filter_var($_POST['emailP'], FILTER_VALIDATE_EMAIL));

$token = bin2hex(random_bytes(16));

$idDoc = $_SESSION["doctor"]["idDoctor"];

try{

require_once "../connect_BDD.php";

$pdo = new PDO($attr, $user, $pass, $opts);

$sql = "INSERT INTO Patients (nameP, surnameP, numSecuriteSociale, emailP, role, token, idDoctor ) VALUES (:nameP, :surnameP, :numSecuriteSociale, :emailP, :patient, :token, :idDoc)";

    $query = $pdo->prepare($sql);

    $query->bindValue(':nameP', $nameP, PDO::PARAM_STR);
    $query->bindValue(':surnameP', $surnameP, PDO::PARAM_STR);
    $query->bindValue(':numSecuriteSociale', $numSecu, PDO::PARAM_STR);
    $query->bindValue(':emailP', $emailP, PDO::PARAM_STR);
    $query->bindValue(":patient","PATIENT", PDO::PARAM_STR);
    $query->bindValue(":token",$token, PDO::PARAM_STR);
    $query->bindValue(":idDoc",$idDoc, PDO::PARAM_STR);

    $query->execute();

    header('location:../../PUBLIC/mesPatients.php');

}catch (PDOException $e) {
    throw new PDOException($e->getMessage(), (int)$e->getCode());
}