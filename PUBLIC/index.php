<?php
$title = 'Accueil';
require '../INCLUDES/header.php';
?>

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
            <p>N'attendez plus, <span class="darkred">inscrivez-vous</span> en suivant le lien ci-dessous.</p>
        </div>

        <div class="imgHome">
            <img src="../IMG/doctor_one.png" alt="Image docteur">
        </div>
    </main>
    <div class="inscription">
        <div class="m-5">
            <button class="btn btn-lg btn-primary" type="button"><a href="./formD.php">Je suis un professionnel</a></button>
            <button class="btn btn-lg btn-primary" type="button"><a href="./formP.php">Je suis un patient</a></button>
        </div>
    </div>



</body>

</html>