<?php
require "../connect_BDD.php";
try {
    $pdo = new PDO($attr, $user, $pass, $opts);

    $sql = " CREATE TABLE IF NOT EXISTS `doctors` (
     idDoctor INT(10) AUTO_INCREMENT PRIMARY KEY,
     nameD VARCHAR(50) NOT NULL, 
     surnameD VARCHAR(50) NOT NULL,
     numAdeli VARCHAR(15) UNIQUE NOT NULL,
     speciality VARCHAR(20) NOT NULL, 
     emailD VARCHAR(150) NOT NULL, 
     passwordD VARCHAR(150) NOT NULL, 
     role VARCHAR(20) NOT NULL,
     isVerified BOOL,
     token VARCHAR(150) NULL
    )";

    $pdo->exec($sql);

    echo "table doctors créer";
}
catch (PDOException $e) {
    throw new PDOException($e->getMessage(), (int)$e->getCode());
}


try {
    $pdo = new PDO($attr, $user, $pass, $opts);

$sql = " CREATE TABLE IF NOT EXISTS `patients` (
     idPatient INT(10) AUTO_INCREMENT PRIMARY KEY,
     nameP VARCHAR(50) NOT NULL, 
     surnameP VARCHAR(50) NOT NULL,
     numSecuriteSociale VARCHAR(20) UNIQUE NOT NULL,
     groupeSanguin VARCHAR(20) NULL, 
     emailP VARCHAR(150) NOT NULL, 
     passwordP VARCHAR(150) NOT NULL, 
     role VARCHAR(20) NOT NULL,
     phone VARCHAR(20) NOT NULL,
     isVerified BOOL NULL,
     token VARCHAR(150) NULL,
     idDoctor INT(10) NULL,
     FOREIGN KEY (idDoctor) REFERENCES Doctors(idDoctor)
    )";

    $pdo->exec($sql);

    echo "table patients créer";
}


catch (PDOException $e) {
    throw new PDOException($e->getMessage(), (int)$e->getCode());
}


try {
    $pdo = new PDO($attr, $user, $pass, $opts);

    $sql = "CREATE TABLE IF NOT EXISTS `documents` (
    idDocument INT(10) AUTO_INCREMENT PRIMARY KEY,
    idDoctor INT(10) NOT NULL,
    idPatient INT(10) NOT NULL,
    consultations TEXT NULL,
    ordonnances TEXT NULL,
    date DATE NOT NULL,
    FOREIGN KEY (idDoctor) REFERENCES Doctors(idDoctor),
    FOREIGN KEY (idPatient) REFERENCES Patients(idPatient)
        
    )";


    $pdo->exec($sql);

    echo "table documents créer";
    }


catch (PDOException $e) {
throw new PDOException($e->getMessage(), (int)$e->getCode());
}


try {
    $pdo = new PDO($attr, $user, $pass, $opts);

    $sql = "CREATE TABLE IF NOT EXISTS `contact`(
    idContact INT( 10 ) AUTO_INCREMENT PRIMARY KEY,
    nameC VARCHAR( 20 ) NOT NULL,
    emailC VARCHAR( 30 ) NOT NULL,
    message TEXT NOT NULL)";

    $pdo->exec($sql);
    echo "table documents créer";

} catch(PDOException $e) {
    throw new PDOException($e->getMessage(), (int)$e->getCode());
}

try {
    $pdo = new PDO($attr, $user, $pass, $opts);

    $sql = "CREATE TABLE IF NOT EXISTS `rdv` (
    idRdv INT(10) AUTO_INCREMENT PRIMARY KEY,
    idDoctor INT(10) NOT NULL,
    idPatient INT(10) NOT NULL,
    date DATE NOT NULL,
    FOREIGN KEY (idDoctor) REFERENCES Doctors(idDoctor),
    FOREIGN KEY (idPatient) REFERENCES Patients(idPatient)
        
    )";


    $pdo->exec($sql);

    echo "table documents créer";
    }


catch (PDOException $e) {
throw new PDOException($e->getMessage(), (int)$e->getCode());
}