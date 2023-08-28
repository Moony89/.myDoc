<?php
    session_start();

    $titre = "Modifier mes informations";
    require_once '../INCLUDES/header.php';
    require_once '../INCLUDES/menu.php';
    
?>    

<body>
    <h1>Entrez vos informations puis validez le formulaire</h1>

    <form class="formP" action="../BDD/TRAITEMENT/update_profileP.php" method="POST">
        <fieldset>
            <legend>Modifier mes informations: </legend>
            <div class="form-group">
            <label for="nameP" class="form-label mt-4">Votre nom</label>
            <input type="text" name="nameP" class="form-control bg-primary-subtle" id="nameP" value="<?=$_SESSION['USER']['nameP'];?>">
            </div>
            <div class="form-group">
            <label for="surnameP" class="form-label mt-4">Votre prénom</label>
            <input type="text" name="surnameP" class="form-control bg-primary-subtle" id="surnameP"  value="<?=$_SESSION['USER']['surnameP'];?>">
            </div>
            <div class="form-group">
            <label for="numSecuriteSociale" class="form-label mt-4">Votre numéro de Securité Sociale</label>
            <input type="text" name="numSecuriteSociale" class="form-control bg-primary-subtle" id="numSecuriteSociale"  value="<?=$_SESSION['USER']['numSecuriteSociale'];?>">
            </div>
            <div class="form-group">
            <label for="phone" class="form-label mt-4">Votre téléphone</label>
            <input type="tel" name="phone" class="form-control bg-primary-subtle" id="phone"  value="<?=$_SESSION['USER']['phone'];?>">
            </div>
            <button type="submit" class="btn btn-primary" name="valider_modif">Valider les modifications</button>
        </fieldset>
    </form>

    <?php
        require_once '../INCLUDES/footer.php';
    ?>


</body>
</html>