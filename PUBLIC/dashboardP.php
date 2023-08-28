<?php
session_start();

$titre = "Mon Compte";
require_once '../INCLUDES/header.php';
require_once '../INCLUDES/menu.php';

?>
<body>
    <h1>Bienvenue <span class="darkred"><?= $_SESSION['USER']['surnameP'] . " " . $_SESSION['USER']['nameP'] ?></span></h1>

    <main class="dashboardP mb-5">

   <?php require_once "../INCLUDES/menu_aside_patient.php";?>
        
        <div class="affListPatient mb-5">
            <h2>Mes informations</h2>
            <div class="form-group m-1">
                <fieldset>
                    <input class="form-control" id="readOnlyInput" type="text" placeholder="NOM: <?=$_SESSION['USER']['nameP']?>" readonly="">
                </fieldset>
            </div>
            <div class="form-group m-1">
                <fieldset>
                    <input class="form-control" id="readOnlyInput" type="text" placeholder="PRENOM: <?=$_SESSION['USER']['surnameP']?>" readonly="">
                </fieldset>
            </div>
            <div class="form-group m-1">
                <fieldset>
                    <input class="form-control" id="readOnlyInput" type="text" placeholder="N° SS: <?=$_SESSION['USER']['numSecuriteSociale']?>" readonly="">
                </fieldset>
            </div>
            <div class="form-group m-1">
                <fieldset>
                    <input class="form-control" id="readOnlyInput" type="text" placeholder="Email: <?=$_SESSION['USER']['emailP']?>" readonly="">
                </fieldset>
            </div>
            <div class="form-group m-1">
                <fieldset>
                    <input class="form-control" id="readOnlyInput" type="text" placeholder="N° Tél: <?=$_SESSION['USER']['phone']?>" readonly="">
                </fieldset>
            </div>
            


        </div>

    </main>



    <?php

    require_once '../INCLUDES/footer.php';


    ?>