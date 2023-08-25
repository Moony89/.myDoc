<?php

$host="localhost";
$user="root";
$pass="";

try {
    $pdo = new PDO("mysql:host=$host", $user, $pass);

    $sql = "CREATE DATABASE IF NOT EXISTS `myDoc` "; 
    $pdo->exec($sql);
    echo "Creation reussi";
}
catch (PDOException $e) {
    throw new PDOException($e->getMessage(), (int)$e->getCode());
}
 




