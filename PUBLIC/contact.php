<?php
$titre = 'Contact';
require_once '../INCLUDES/header.php';
require_once '../INCLUDES/menu.php';
?>

<h1 class=".text-primary"> Une question? Plus d' <span class="darkred">informations</span> ?</h1>

<main class="mainContact">
    <div class="contactForm">
        <form action="../BDD/TRAITEMENT/traitement_contact.php" method="POST">
            <fieldset>
                <legend>Ecrivez-nous !</legend>
                <div class="form-group">
                    <input type="text" class="form-control" id="nameContact" name="nameC" placeholder="Votre nom">
                </div>
                <div class="form-group">
                    <input type="email" class="form-control" id="exampleInputEmail1" name="emailC" aria-describedby="emailHelp" placeholder="Votre adresse email">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>

                <div class="form-group">
                    <textarea class="form-control" id="exampleTextarea" name="message" rows="3" placeholder="Votre message"></textarea>
                </div>

            </fieldset>
            <button type="submit" name="J'envoie" class="btn btn-primary btn-lg">J'envoie!</button>
        </form>

        </div>
        <div class="imgContact">
            <img src="../IMG/contact_img.png" alt="Personne tapant au clavier.">
        </div>
    </main>
</body>

<?php
    require_once '../INCLUDES/footer.php';
?>