
<?php
require_once "security.php";

    $nameP = protect($_POST['nameP']);
    $surnameP = protect($_POST['surnameP']);
    $numSecu = $_POST['numSecuriteSociale'];
    $emailP = protect(filter_var($_POST['emailP'], FILTER_VALIDATE_EMAIL));
    $passP1 = protect($_POST['passP1']);
    $passP2 = protect($_POST['passP2']);
    $phoneP = protect($_POST['phoneP']);

    $token = bin2hex(random_bytes(16));

if (empty($_POST['nameP']) || empty($_POST['surnameP']) || empty($_POST['numSecuriteSociale']) || empty($_POST['emailP']) || empty($_POST['passP1']) || empty($_POST['passP2']) || empty($_POST['phoneP'])) {
    echo "Veuillez remplir le formulaire!";
  

} else {

    if ($passP1 === $passP2) {

    $passP = password_hash($passP2, PASSWORD_ARGON2ID);

    try{

    require_once 'connect_BDD.php';

    $pdo = new PDO($attr, $user, $pass, $opts);

    $sql = "INSERT INTO Patients (nameP, surnameP, numSecuriteSociale, emailP, passwordP, role, phone, token) VALUES (:nameP, :surnameP, :numSecuriteSociale, :emailP, :passwordP, :patient, :phoneP, :token)";

        $query = $pdo->prepare($sql);

        $query->bindValue(':nameP', $nameP, PDO::PARAM_STR);
        $query->bindValue(':surnameP', $surnameP, PDO::PARAM_STR);
        $query->bindValue(':numSecuriteSociale', $numSecu, PDO::PARAM_STR);
        $query->bindValue(':emailP', $emailP, PDO::PARAM_STR);
        $query->bindValue(':passwordP', $passP, PDO::PARAM_STR);
        $query->bindValue(":patient","PATIENT", PDO::PARAM_STR);
        $query->bindValue(':phoneP', $phoneP, PDO::PARAM_STR);
        $query->bindValue(":token",$token, PDO::PARAM_STR);

        $query->execute();

        session_start();

            // $_SESSION[""] = [
            //     "Adeli" => $doctor["numAdeli"],
            //     "roles" => $doctor["role"],
            //     "name"  => $doctor["nameD"],
            //     "idDoctor" => $doctor["idDoctor"]
            // ];

        header("location:../../PUBLIC/dashboardP.php");

        }catch (PDOException $e) {
        throw new PDOException($e->getMessage(), (int)$e->getCode());
    }    
    
    } else {
        echo "Les mots de passe ne sont pas identiques";
    
    }
}

?>