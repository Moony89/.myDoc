
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="stylesheet" href="./CSS/bootstrap.min-2.css">
</head>
<body>

    <?php
        require '../INCLUDES/menu.php';
        require '../INCLUDES/footer.php';
    ?>    

    <form action="../BDD/traitementDocteur.php" method="POST">
        <fieldset>
            <legend>Connexion des profesionels de la medecine :</legend>


            <div class="form-group">
            <label for="exampleInputEmail1" class="form-label mt-4">Votre Email</label>
            <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
            </div>
            <div class="form-group">
            <label for="pass1" class="form-label mt-4">Mot de passe</label>
            <input type="password" name="pass1" class="form-control" id="pass1"  placeholder="Mot de passe">
            </div>

            <button type="submit" class="btn btn-primary">Connexion</button>
        </fieldset>
    </form>


</body>
</html>