<?php       

require_once "../security.php";

$nameD = protect($_POST['nameD']);
$surnameD = protect($_POST['surnameD']);
$numAdeli = protect($_POST['numAdeli']);
$emailD = protect(filter_var($_POST['emailD'], FILTER_VALIDATE_EMAIL));
$passD1 = protect($_POST['passD1']);
$passD2 = protect($_POST['passD2']);



$token = bin2hex(random_bytes(16));


if (empty($_POST['nameD']) || empty($_POST['surnameD']) || empty($_POST['numAdeli']) || empty($_POST['emailD']) || empty($_POST['passD1']) || empty($_POST['passD2'])) {
    echo "Veuillez remplir le formulaire!";

} else {

    if ($passD1 === $passD2) {

        $passD = password_hash($passD2, PASSWORD_ARGON2ID);

        try {

        require_once "../connect_BDD.php";

        $pdo = new PDO($attr, $user, $pass, $opts);

        $sql = "INSERT INTO Doctors (nameD, surnameD, numAdeli, emailD, passwordD, token, role) VALUES ( :nameD, :surnameD, :numAdeli, :emailD, :passwordD, :token, :doc)";

        $query = $pdo->prepare($sql);

        $query->bindValue(":nameD",$nameD, PDO::PARAM_STR);
        $query->bindValue(":surnameD",$surnameD, PDO::PARAM_STR);
        $query->bindValue(":numAdeli",$numAdeli, PDO::PARAM_INT);
        $query->bindValue(":emailD",$emailD, PDO::PARAM_STR);
        $query->bindValue(":passwordD",$passD, PDO::PARAM_STR);
        $query->bindValue(":token",$token, PDO::PARAM_STR);
        $query->bindValue(":doc","DOC", PDO::PARAM_STR);
        

        $query->execute(); 

        session_start();

            $_SESSION["doctor"] = [
                "Adeli" => $doctor["numAdeli"],
                "roles" => $doctor["role"],
                "name"  => $doctor["nameD"],
                "idDoctor" => $doctor["idDoctor"]
            ];
        }catch (PDOException $e) {
            throw new PDOException($e->getMessage(), (int)$e->getCode());
        }

        require_once "./mail.php";

        $adress = $emailD;
        $subject = "Lien de Verification";
        $message = "<h3>Bonjour, Dr $nameD Veuillez Cliquer sur le liens si dessous pour vadider votre compte
        
        <a href=https://localhost/.myDoc/BDD/TRAITEMENT/traitement_auth.php?token=$token&id=$numAdeli>ICI!!!</a></h3>";

        sendMail($adress, $subject, $message);


  header("location:../../PUBLIC/connexionD.php");
    }else{
        echo "Les mots de passe ne sont pas identiques";
    }
}


