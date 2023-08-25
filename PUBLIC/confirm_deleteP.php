<?php
$titre = "Supprimer mon compte";
require '../INCLUDES/header.php';
?>



<body>

    <?php

    require '../INCLUDES/menu.php';
    ?>

    <div class="container m-auto ">
        <h1>Etes-vous sûr(e) de vouloir supprimer définitivement votre compte?</h1>
        <h3>Cette action est irréversible.</h3>
        <button type="button" class="btn btnPatient btn-warning btn-lg"><a href="../BDD/TRAITEMENT/delete_profileP.php">Supprimer mon compte</a></button>
    </div>
    



    <?php
    require '../INCLUDES/footer.php';

    ?>
</body>