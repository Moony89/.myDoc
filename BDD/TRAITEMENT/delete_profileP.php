<?php
session_start();
require '../connectBDD.php';


    if (isset($_SESSION['patient'])
    ) { 

        $idPatient = $_SESSION['patient']['idPatient'];

        $sql = "SELECT * FROM Patients WHERE idPatient = $idPatient";
            
        $query = $connexion->query($sql);
        $old_Infos_Patient = $query->fetch(PDO::FETCH_ASSOC);
        

        $nameP = $old_Infos_Patient['nameP'];
        $surnameP = $old_Infos_Patient['surnameP'];
        $numSecu = $old_Infos_Patient['numSecuriteSociale'];
        $phone = $old_Infos_Patient['phone'];


        $query = $connexion->prepare("DELETE FROM Patients WHERE idPatient = :idPatient"); 

        $query->bindValue(':idPatient', $idPatient, PDO::PARAM_STR);

        $result = $query->execute();

            if($result || $_SESSION['patient']){

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