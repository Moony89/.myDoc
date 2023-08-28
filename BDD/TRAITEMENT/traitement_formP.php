<?php


$nameP = htmlspecialchars($_POST['nameP']);  // on rajoute cette méthode pour lutter c/ les failles XSS
$surnameP = htmlspecialchars($_POST['surnameP']);
$numSecu = $_POST['numSecuriteSociale'];
$emailP = filter_var($_POST['emailP'], FILTER_VALIDATE_EMAIL);
$passwordP = password_hash($_POST['passwordP'], PASSWORD_DEFAULT);
$phone = $_POST['phone'];

$token = bin2hex(random_bytes((16)));

if ((!empty($_POST['nameP'])) && (!empty($_POST['surnameP'])) && (!empty($_POST['numSecuriteSociale'])) &&
  (!empty($_POST['emailP'])) && (!empty($_POST['passwordP'])) && (!empty($_POST['phone']))) {


    require_once "../connect_BDD.php";

    $pdo = new PDO($attr, $user, $pass, $opts);

  $sql = 'INSERT INTO Patients(`nameP`, `surnameP`, `numSecuriteSociale`, `emailP`, `passwordP`, `role`, `phone`, `token`) 
      VALUES  (:nameP, :surnameP, :numSecuriteSociale, :emailP, :passwordP, :role, :phone, :token)';

  $query = $pdo->prepare($sql);

  $query->bindValue(':nameP', $nameP, PDO::PARAM_STR);
  $query->bindValue(':surnameP', $surnameP, PDO::PARAM_STR);
  $query->bindValue(':numSecuriteSociale', $numSecu, PDO::PARAM_STR);
  $query->bindValue(':emailP', $emailP, PDO::PARAM_STR);
  $query->bindValue(':passwordP', $passwordP, PDO::PARAM_STR);
  $query->bindValue(':role', 'PATIENT', PDO::PARAM_STR);
  $query->bindValue(':phone', $phone, PDO::PARAM_STR);
  $query->bindValue(':token', $token, PDO::PARAM_STR);


  $query->execute();

  header("location:../../PUBLIC/connexionP.php");

} else {
  echo '<div class="alert alert-dismissible alert-danger">
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    <strong>Oh snap!</strong> <a href="#" class="alert-link">Change a few things up</a> and try submitting again.
  </div>Tous les champs sont requis. Merci de compléter correctement le formulaire.';
}
//peaufiner le msg erreur utilisateur.
?>