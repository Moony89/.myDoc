<?php

try {

    $id = $_GET['id'];
    $token = $_GET['token'];

    require_once "../connect_BDD.php";

    $pdo = new PDO($attr, $user, $pass, $opts);

    $sql = " SELECT * FROM `doctors` WHERE doctors.numAdeli = ".$id." ";

    $query = $pdo->prepare($sql);

    $doctors = $query->fetch();
        var_dump($doctors);die;
    if (($doctors['numAdeli'] === $id) && ($doctors['token'] === $token)) {

        $sql = "UPDATE `doctors` SET `isVerified` = :isVerified, `token` = :token WHERE token = $token";


        $token = bin2hex(random_bytes(16));

        $query = $pdo->prepare($sql);

        $data = [
            ':isVerified' => true,
            ':token' => $token
        ];


        $query->execute($data);

        if ($query) {
            require_once "../../INCLUDES/header.php"
?> <div class="alert alert-dismissible alert-success">
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                <strong>Well done!</strong> You successfully read <a href="#" class="alert-link">this important alert message</a>.
            </div> <?php
                }
            }
        } catch (PDOException $e) {
            throw new PDOException($e->getMessage(), (int)$e->getCode());
        }
