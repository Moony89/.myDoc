<?php
session_start();

require_once '../INCLUDES/header.php';

?>

<body>

<?php
require_once '../INCLUDES/menu.php';
?>

<main class="dashboardP">

        <div class="bgBtnListPatient">
            <div class="btnListPatient">
                <button type="button" class="btn btnPatient btn-primary btn-lg"><a href="dashboardP.php">Mon compte</a></button>
                <button type="button" class="btn btnPatient btn-warning btn-lg"><a href="docsP.php">Mes documents</a></button>
                <button type="button" class="btn btnPatient btn-primary btn-lg"><a href="rdvsP.php">Mes RDVs</a></button>
                <button type="button" class="btn btnPatient btn-primary btn-lg"><a href="monDoc.php">Mon médecin traitant</a></button>
                <button type="button" class="btn btnPatient btn-primary btn-lg"><a href="update_profileP.php">Modifier mon profil</a></button>
                <button type="button" class="btn btnPatient btn-primary btn-lg"><a href="confirm_deleteP.php">Supprimer mon compte</a></button>
                <button type="button" class="btn btnPatient btn-primary btn-lg"><a href="../BDD/TRAITEMENT/traitement_deconnexion.php">Déconnexion</a></button>
            </div>

        </div>

        <div class="affListPatient">
            
        </div>

    </main>


<?php
require_once '../INCLUDES/footer.php';
?>

</body>