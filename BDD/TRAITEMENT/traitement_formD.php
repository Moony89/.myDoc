<?php       
 use PHPMailer\PHPMailer\Exception;     
 use PHPMailer\PHPMailer\PHPMailer;   
 use PHPMailer\PHPMailer\SMTP;

require_once "../../INCLUDES/PHPMAILER/Exception.php";
require_once "../../INCLUDES/PHPMAILER/PHPMailer.php";
require_once "../../INCLUDES/PHPMAILER/SMTP.php";
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

        $sql = "INSERT INTO doctors (nameD, surnameD, numAdeli, emailD, passwordD, token, role) VALUES ( :nameD, :surnameD, :numAdeli, :emailD, :passwordD, :token, :doc)";

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
      
        $mail = new PHPMailer(true);

        try{
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;

            $mail->isSMTP();
            $mail->Host = "localhost";
            $mail->Port = 1025;

            $mail->CharSet = "utf-8";

            $mail->addAddress("$emailD");

            $mail->setFrom("lhuilejohan85@gmail.com");

            $mail->isHTML();

            $mail->Subject = "Lien de Verification ";

            $mail->Body = "Bonjour, Dr $nameD Veuillez Cliquer sur le liens si dessous pour vadider votre compte
        
             .myDoc/BDD/TRAITEMENT/traitement_auth.php?token=$token&id=$numAdeli";

            $mail->send();

            echo "Message envoyé";

        }
        catch(Exception){

            echo "Message non envoyé. Erreur: {$mail->ErrorInfo}";
        }
  header("location:../../PUBLIC/connexionD.php");
    }else{
        echo "Les mots de passe ne sont pas identiques";
    }
}


