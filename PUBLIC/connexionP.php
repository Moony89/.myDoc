<?php
$titre = 'Connexion Patient';
require_once '../INCLUDES/header.php';
require_once '../INCLUDES/menu.php';

?>
<body> 

    <form class="connectP m-4" action="../BDD/TRAITEMENT/traitement_connexionP.php" method="POST">
        <fieldset>
            <legend>Connexion Patient:</legend>


            <div class="form-group">
            <label for="emailP" class="form-label mt-4">Votre Email</label>
            <input type="email" name="emailP" class="form-control" id="exampleInputEmail1" placeholder="Email">
            </div>
            <div class="form-group">
            <label for="passwordP" class="form-label mt-4">Mot de passe</label>
            <input type="password" name="passwordP" class="form-control" id="passwordP"  placeholder="Mot de passe">
            <p><a href="#">Mot de passe oublié?</a></p>
            </div>

            <button type="submit" name="connexion" class="btn btn-primary">Connexion</button>
        </fieldset>
    </form>

    <?php
        require '../INCLUDES/footer.php';
    ?>

</body>
<?php

require_once '../INCLUDES/footer.php';
?>