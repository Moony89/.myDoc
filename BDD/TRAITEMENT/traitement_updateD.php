<?php

session_start();

try{

    require_once "../connect_BDD.php";

    $idDoc = $_SESSION["USER"]["idDoctor"];

    $nameD = $_POST['nameD'];
    $surnameD = $_POST['surnameD'];
    $numAdeli = $_POST['numAdeli'];
    $speciality = $_POST['speciality'];
    $numRue = $_POST['numRue'];
    $rue = $_POST['rue'];
    $codePostal = $_POST['codePostal'];
    $ville = $_POST['ville'];
    $phoneD = $_POST['phoneD'];
    $emailD = $_POST['emailD'];

        
        $pdo = new PDO($attr, $user, $pass, $opts);
        
    
        $sql = "UPDATE Doctors SET 
        `nameD`=:nameD,
        `surnameD`= :surnameD,
        `numAdeli`= :numAdeli,
        `speciality`= :speciality,
        `numRue`= :numRue,
        `rue`= :rue,
        `codePostal`= :codePostal,
        `ville`= :ville,
        `phone`= :phoneD,
        `emailD`= :emailD WHERE idDoctor = $idDoc";
        
        

        $query = $pdo->prepare($sql);

        $data = [    
        ':nameD'=>$nameD,
        ':surnameD'=>$surnameD,
        ':numAdeli'=>$numAdeli,
        ':speciality'=>$speciality,
        ':numRue'=>$numRue,
        ':rue'=>$rue,
        ':codePostal'=>$codePostal,
        ':ville'=>$ville,
        ':phoneD'=>$phoneD,
        ':emailD'=>$emailD
    ];
        
        $result = $query->execute($data); 
        
        header('location:../../PUBLIC/monCompteD.php');

    }catch (PDOException $e) {
        throw new PDOException($e->getMessage(), (int)$e->getCode());
    }
        

