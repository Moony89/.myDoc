<?php
session_start();

$title = "Mon Compte";

require '../INCLUDES/header.php';
?>

<body>

    <?php
    require_once '../INCLUDES/menu.php';
    ?>

    <h1>Bienvenue <span class="darkred"><?= $_SESSION['patient']['surnameP'] . " " . $_SESSION['patient']['nameP'] ?></span></h1>

    <main class="dashboardP mb-5">

        <div class="bgBtnListPatient">
            <div class="btnListPatient">
                <button type="button" class="btn btnPatient btn-warning btn-lg"><a href="dashboardP.php">Mon compte</a></button>
                <button type="button" class="btn btnPatient btn-primary btn-lg"><a href="docsP.php">Mes documents</a></button>
                <button type="button" class="btn btnPatient btn-primary btn-lg"><a href="rdvsP.php">Mes RDVs</a></button>
                <button type="button" class="btn btnPatient btn-primary btn-lg"><a href="monDoc.php">Mon médecin traitant</a></button>
                <button type="button" class="btn btnPatient btn-primary btn-lg"><a href="update_profileP.php">Modifier mon profil</a></button>
                <button type="button" class="btn btnPatient btn-primary btn-lg"><a href="confirm_deleteP.php">Supprimer mon compte</a></button>
                <button type="button" class="btn btnPatient btn-primary btn-lg"><a href="../BDD/TRAITEMENT/traitement_deconnexion.php">Déconnexion</a></button>
            </div>

        </div>

        <div class="affListPatient mb-5">
            <h2>Mes informations</h2>
            <div class="form-group m-1">
                <fieldset>
                    <input class="form-control" id="readOnlyInput" type="text" placeholder="NOM: <?=$_SESSION['patient']['nameP']?>" readonly="">
                </fieldset>
            </div>
            <div class="form-group m-1">
                <fieldset>
                    <input class="form-control" id="readOnlyInput" type="text" placeholder="PRENOM: <?=$_SESSION['patient']['surnameP']?>" readonly="">
                </fieldset>
            </div>
            <div class="form-group m-1">
                <fieldset>
                    <input class="form-control" id="readOnlyInput" type="text" placeholder="N° SS: <?=$_SESSION['patient']['numSecuriteSociale']?>" readonly="">
                </fieldset>
            </div>
            <div class="form-group m-1">
                <fieldset>
                    <input class="form-control" id="readOnlyInput" type="text" placeholder="Email: <?=$_SESSION['patient']['emailP']?>" readonly="">
                </fieldset>
            </div>
            <div class="form-group m-1">
                <fieldset>
                    <input class="form-control" id="readOnlyInput" type="text" placeholder="N° Tél: <?=$_SESSION['patient']['phone']?>" readonly="">
                </fieldset>
            </div>
            


        </div>

    </main>



    <?php

    require_once '../INCLUDES/footer.php';


    ?>