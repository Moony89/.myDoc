<?php

require_once 'connectBDD.php';



//Création de la table Doctors

$doctors = "Doctors";
try {
     $connexion = new PDO("mysql:dbname=myDoc;host=localhost", "root", "" );

     $connexion->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION ); //Gérer les erreurs

     $sql = "CREATE TABLE IF NOT EXISTS $doctors(
     idDoctor INT( 10 ) AUTO_INCREMENT UNIQUE PRIMARY KEY,
     nameD VARCHAR( 50 ) NOT NULL, 
     surnameD VARCHAR( 50 ) NOT NULL,
     numAdeli VARCHAR( 15 ) NOT NULL,
     speciality VARCHAR( 20 ) NOT NULL, 
     emailD VARCHAR( 150 ) NOT NULL, 
     passwordD VARCHAR( 150 ) NOT NULL, 
     role VARCHAR( 20 ),
     isVerified BOOLEAN NULL,
     token VARCHAR( 150 ) NULL)" ;

     $connexion->exec($sql); // exécution de l'instruction
     print("Table $doctors créée.<br>");

} catch(PDOException $e) {
    echo $e->getMessage();
}

//Création de la table Patients

$patients = "Patients";
try {
     $connexion = new PDO("mysql:dbname=myDoc;host=localhost", "root", "" );

     $connexion->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION ); //Gérer les erreurs

     $sql = "CREATE TABLE IF NOT EXISTS $patients(
     idPatient INT( 10 ) AUTO_INCREMENT PRIMARY KEY,
     nameP VARCHAR( 50 ) NOT NULL, 
     surnameP VARCHAR( 50 ) NOT NULL,
     numSecuriteSociale VARCHAR( 20 ) NOT NULL, 
     emailP VARCHAR( 150 ) NOT NULL, 
     passwordP VARCHAR( 150 ) NOT NULL, 
     role VARCHAR( 20 ) NOT NULL,
     phone VARCHAR( 20 ) NOT NULL,
     isVerified BOOLEAN NULL,
     token VARCHAR( 150 ) NULL,
     idDoctor INT( 10 ) NULL,
     FOREIGN KEY (idDoctor) REFERENCES Doctors (idDoctor))" ;

     $connexion->exec($sql); // exécution de l'instruction
     print("Table $patients créée.<br>");

} catch(PDOException $e) {
    echo $e->getMessage();
}

// Création de la table Documents

$documents = "Documents";
try {
     $connexion = new PDO("mysql:dbname=myDoc;host=localhost", "root", "" );

     $connexion->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION ); //Gérer les erreurs

     $sql = "CREATE TABLE IF NOT EXISTS $documents(
     idDocument INT( 10 ) AUTO_INCREMENT PRIMARY KEY,
     idDoctor INT( 10 ) NOT NULL,
     idPatient INT( 10 ) NOT NULL,
     consultations TEXT NULL,
     ordonnances TEXT NULL,
     date DATE NOT NULL,
     FOREIGN KEY (idDoctor) REFERENCES Doctors (idDoctor),
     FOREIGN KEY (idPatient) REFERENCES Patients (idPatient))" ;

     $connexion->exec($sql); // exécution de l'instruction
     print("Table $documents créée.<br>");

} catch(PDOException $e) {
    echo $e->getMessage();
}

//Création de la table Contact

$contact = "Contact";

try {
    $connexion = new PDO("mysql:dbname=myDoc;host=localhost", "root", "" );

    $connexion->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION ); //Gérer les erreurs

    $sql = "CREATE TABLE IF NOT EXISTS $contact(
    idContact INT( 10 ) AUTO_INCREMENT PRIMARY KEY,
    nameC VARCHAR( 20 ) NOT NULL,
    emailC VARCHAR( 30 ) NOT NULL,
    message TEXT NOT NULL)";

    $connexion->exec($sql); // exécution de l'instruction
    print("Table $contact créée.\n");

} catch(PDOException $e) {
   echo $e->getMessage();
}


?>