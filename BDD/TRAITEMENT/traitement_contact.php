<?php


$nameC = htmlspecialchars($_POST['nameC']);  // on rajoute cette méthode pour lutter c/ les failles XSS
$emailC = filter_var($_POST['emailC'], FILTER_VALIDATE_EMAIL);
$message = htmlspecialchars($_POST['message']);

if (isset($_POST["J'envoie"])  && (!empty($_POST['nameC'])) && (!empty($_POST['emailC'])) && (!empty($_POST['message']))) {
    require_once '../connectBDD.php';

    $pdo = new PDO("mysql:host=$servername;dbname=$database;", $username, $password, $options);

  $sql = 'INSERT INTO Contact(`nameC`,`emailC`, `message`) VALUES  (:nameC, :emailC, :message)';

  $query = $pdo->prepare($sql);

  $query->bindValue(':nameC', $nameC, PDO::PARAM_STR);
  $query->bindValue(':emailC', $emailC, PDO::PARAM_STR);
  $query->bindValue(':message', $message, PDO::PARAM_STR);


  $query->execute();

  header("location: ../../PUBLIC/retourContact.php");

} else {
  echo '<div class="alert alert-dismissible alert-danger">
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    <strong>Oh snap!</strong> <a href="#" class="alert-link">Change a few things up</a> and try submitting again.
  </div>Tous les champs sont requis. Merci de compléter correctement le formulaire.';
}

?>