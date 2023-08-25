<?php

$numAdeli = $_POST['numAdeli'];
$pass1 = $_POST['pass1'];

if(isset($_POST['numAdeli'], $_POST['pass1']) && !empty($_POST['numAdeli']) && !empty($_POST['pass1'])) {

try {
   


    require_once "../connect_BDD.php";

    $pdo = new PDO($attr, $user, $pass, $opts);

    $sql = "SELECT * FROM doctors WHERE numAdeli = :numAdeli";

    $query = $pdo->prepare($sql);

    $query->bindValue(":numAdeli", $_POST['numAdeli'], PDO::PARAM_STR);

    $query->execute();

    $doctor = $query->fetch();

    if(!$doctor){
        die("L'utilisateur n'existe pas");
    } 
    
        if(!password_verify($pass1, $doctor["passwordD"])){
            die("L'utilisateur et/ou le mot de passe est incorrect");
        }
        
            session_start();

            $_SESSION["doctor"] = [
                "Adeli" => $doctor["numAdeli"],
                "roles" => $doctor["role"],
                "name"  => $doctor["nameD"],
                "idDoctor" => $doctor["idDoctor"]
            ];


        header("location:../../PUBLIC/mesPatients.php");
     } catch (PDOException $e) {
        throw new PDOException($e->getMessage(), (int)$e->getCode());
    }       
}
