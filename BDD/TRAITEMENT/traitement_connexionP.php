<?php

require_once "../connect_BDD.php";

$pdo = new PDO($attr, $user, $pass, $opts);

if(isset($_POST['connexion']) && !empty($_POST['emailP']) && !empty($_POST['passwordP'])){

    $emailP = filter_var($_POST['emailP'], FILTER_VALIDATE_EMAIL);
    $passwordP = $_POST['passwordP'];

    $query = $pdo->prepare('SELECT * FROM Patients 
        WHERE emailP = :emailP');

    $query->execute(array(':emailP'=>$emailP));

    $patient = $query->fetch();

    if($patient && (password_verify($passwordP, $patient['passwordP']))){

        session_start();

        echo "<br>Vous êtes bien connecté à votre espace Patient";
        
        $_SESSION["patient"] = [
            "nameP" => $patient['nameP'],
            "surnameP" => $patient['surnameP'],
            "role" => $patient['role'],
            "idPatient" => $patient['idPatient'],
            "emailP" => $patient['emailP'],
            "numSecuriteSociale" => $patient['numSecuriteSociale'],
            "phone" => $patient['phone']
        ];
        
        

        header("location:../../PUBLIC/dashboardP.php");
    }else{

        echo "<br>Identifiants invalides.";
        //peaufiner le message pour l'utilisateur.
    }
}

?>