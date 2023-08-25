<?php
session_start();
require_once "../security.php";

$date = $_POST["date"];
$heure = $_POST["heure"];

$token = bin2hex(random_bytes(16));

$idDoc = $_SESSION["doctor"]["idDoctor"];
$idPatient = $_GET['id'];

try{

require_once "../connect_BDD.php";

$pdo = new PDO($attr, $user, $pass, $opts);

$sql = "INSERT INTO RDV (idDoctor, idPatient, date, heure ) VALUES (:idDoc, :idPatient, :date, :heure)";

    $query = $pdo->prepare($sql);

    $query->bindValue(":date", $date, PDO::PARAM_INT);
    $query->bindValue(":heure",$heure, PDO::PARAM_INT);
    $query->bindValue(":idPatient",$idPatient, PDO::PARAM_INT);
    $query->bindValue(":idDoc",$idDoc, PDO::PARAM_INT);

    $query->execute();

    header('location:../../PUBLIC/mesPatients.php');

}catch (PDOException $e) {
    throw new PDOException($e->getMessage(), (int)$e->getCode());
}