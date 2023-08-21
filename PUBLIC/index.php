<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" defer></script>
    <link rel="stylesheet" href="../CSS/bootstrap.min-2.css">
    <link rel="stylesheet" href="../CSS/style.css">
</head>

<body>
    <?php
    require '../INCLUDES/menu.php';
    require '../INCLUDES/footer.php';
    ?>

    <h1 class=".text-primary"> Bienvenue sur <span class="darkgreen">.myDoc</span></h1>

    <main class="mainHome">
        <div class="welcomeText">
            <p>Le site pour gérer vos documents
                <span class="darkred">santé</span> et pour consulter tous les
                éléments mis à disposition par les
                professionnels en charge de
                votre <span class="darkred">suivi médical.</span>
            </p>
            <p><span class="darkgreen">myDoc.</span> assure la <span class="darkred">confidentialité</span>
                de tous vos documents et vous
                permet ainsi d’avoir votre <span class="darkred">santé</span> à
                portée de clic.</p>
        </div>

        <div class="imgHome">
            <img src="../IMG/doctor_one.png" alt="Image docteur">
        </div>
    </main>
    <div class="inscription">
        <button type="button" class="btn btn-primary btn-lg">Je m'inscris!</button>
        <p>Déjà un compte? <a href="#">Connectez-vous!</a></p>
    </div>



</body>

</html>