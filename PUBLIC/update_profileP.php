<?php
    session_start();
    require '../INCLUDES/header.php';

?>
<body>

    <?php
       require '../INCLUDES/menu.php';
    ?>    

    <h1>Entrez vos informations puis validez le formulaire</h1>

    <form class="formP" action="../BDD/TRAITEMENT/update_profileP.php" method="POST">
        <fieldset>
            <legend>Modifier mes informations: </legend>
            <div class="form-group">
            <label for="nameP" class="form-label mt-4">Votre nom</label>
            <input type="text" name="nameP" class="form-control bg-primary-subtle" id="nameP" value="<?=$_SESSION['patient']['nameP'];?>">
            </div>
            <div class="form-group">
            <label for="surnameP" class="form-label mt-4">Votre prénom</label>
            <input type="text" name="surnameP" class="form-control bg-primary-subtle" id="surnameP"  value="<?=$_SESSION['patient']['surnameP'];?>">
            </div>
            <div class="form-group">
            <label for="numSecuriteSociale" class="form-label mt-4">Votre numéro de Securité Sociale</label>
            <input type="text" name="numSecuriteSociale" class="form-control bg-primary-subtle" id="numSecuriteSociale"  value="<?=$_SESSION['patient']['numSecuriteSociale'];?>">
            </div>
            <div class="form-group">
            <label for="phone" class="form-label mt-4">Votre téléphone</label>
            <input type="tel" name="phone" class="form-control bg-primary-subtle" id="phone"  value="<?=$_SESSION['patient']['phone'];?>">
            </div>
            <button type="submit" class="btn btn-primary" name="valider_modif">Valider les modifications</button>
        </fieldset>
    </form>

    <?php
        require '../INCLUDES/footer.php';
    ?>


</body>
</html>