
<?php
$titre = 'Acceuil';
require_once '../INCLUDES/header.php';
require_once '../INCLUDES/menu.php';
?>

<body>

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
        <button type="button" class="btn btn-primary btn-lg m-4 ">Je m'inscris!</button> <br>
        <a class="btn btn-primary m-4" href="formD.php" role="button">Un docteur</a>
        <a class="btn btn-primary m-4" href="formP.php" role="button">Un patient</a>
        <p>Déjà un compte? <a href="./connexionD.php">Connectez-vous!</a></p>
    </div>
</body>

<?php

require_once '../INCLUDES/footer.php';

?>