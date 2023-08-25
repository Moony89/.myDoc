<?php
        $title = 'Connexion Professionnels';
        require_once '../INCLUDES/header.php';

    ?>  

<body>

    <?php
        require_once '../INCLUDES/menu.php';

    ?>    

    <form action="../BDD/traitement_connexionD.php" method="POST">
        <fieldset>
            <legend>Connexion Professionels de la medecine :</legend>


            <div class="form-group">
            <label for="numAdeli" class="form-label mt-4">Votre numéro Adeli</label>
            <input type="number" name="numAdeli" class="form-control" id="numAdeli"  placeholder="X XX XX XX XXX XXX">
            </div>
            <div class="form-group">
            <label for="pass1" class="form-label mt-4">Mot de passe</label>
            <input type="password" name="pass1" class="form-control" id="pass1"  placeholder="Mot de passe">
            </div>

            <button type="submit" class="btn btn-primary">Connexion</button>
        </fieldset>
    </form>

    <?php
        require '../INCLUDES/footer.php';
    ?>


</body>
</html>