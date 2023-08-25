<?php
session_start();

$idPatient = $_GET['id'];

try{

require_once "../connect_BDD.php";

$pdo = new PDO($attr, $user, $pass, $opts);

$sql = "DELETE FROM RDV WHERE idpatient = $idPatient";

    $query = $pdo->prepare($sql);

    $query->execute();

$sql = "DELETE FROM Patients WHERE idpatient = $idPatient";

    $query = $pdo->prepare($sql);

    $query->execute();

    header('location:../../PUBLIC/mesPatients.php');

}catch (PDOException $e) {
    throw new PDOException($e->getMessage(), (int)$e->getCode());
}