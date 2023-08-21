
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
            <legend>Inscription des professionels de la medecine :</legend>
            <div class="form-group">
            <label for="name" class="form-label mt-4">Votre nom</label>
            <input type="text" name="name" class="form-control" id="name"  placeholder="Nom">
            </div>
            <div class="form-group">
            <label for="surname" class="form-label mt-4">Votre prénom</label>
            <input type="text" name="surname" class="form-control" id="surname"  placeholder="Prénom">
            </div>
            <div class="form-group">
            <label for="numAdeli" class="form-label mt-4">Votre numéro Adeli</label>
            <input type="number" name="numAdeli" class="form-control" id="numAdeli"  placeholder="X XX XX XX XXX XXX">
            </div>
            <div class="form-group">
            <label for="email" class="form-label mt-4">Votre Email</label>
            <input type="email" name="email" class="form-control" id="email" placeholder="Email">
            </div>
            <div class="form-group">
            <label for="pass1" class="form-label mt-4">Mot de passe</label>
            <input type="password" name="pass1" class="form-control" id="pass1"  placeholder="Mot de passe">
            </div>
            <div class="form-group">
            <label for="pass2" class="form-label mt-4">Verifier votre mot de passe </label>
            <input type="password" name="pass2" class="form-control" id="pass2"  placeholder="Mot de passe">
            </div>
            <div class="form-group">
            <label for="phone" class="form-label mt-4">Votre téléphone</label>
            <input type="tel" name="phone" class="form-control" id="phone"  placeholder="XX XX XX XX XX">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </fieldset>
    </form>


</body>
</html>