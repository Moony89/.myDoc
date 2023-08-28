<?php
session_start();
require_once "../connect_BDD.php";

$pdo = new PDO($attr, $user, $pass, $opts);


    if (isset($_SESSION['USER'])
    ) { 

        $idPatient = $_SESSION['USER']['idPatient'];

        $sql = "SELECT * FROM Patients WHERE idPatient = $idPatient";
            
        $query = $pdo->query($sql);
        $old_Infos_Patient = $query->fetch(PDO::FETCH_ASSOC);
        

        $nameP = $old_Infos_Patient['nameP'];
        $surnameP = $old_Infos_Patient['surnameP'];
        $numSecu = $old_Infos_Patient['numSecuriteSociale'];
        $phone = $old_Infos_Patient['phone'];


        $query = $pdo->prepare("DELETE FROM Patients WHERE idPatient = :idPatient"); 

        $query->bindValue(':idPatient', $idPatient, PDO::PARAM_STR);

        $result = $query->execute();

            if($result || $_SESSION['USER']){

                session_unset();
                session_destroy();

                header('location: ../../PUBLIC/retourDelete.php');
        }
       }
        

     else {
        echo '<div class="alert alert-dismissible alert-danger">
          <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
          <strong>Oh snap!</strong> <a href="#" class="alert-link">Change a few things up</a> and try submitting again.
        </div>Tous les champs sont requis. Merci de compléter correctement le formulaire.';
      }