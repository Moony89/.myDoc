<?php
$titre = 'Contact';
require_once '../INCLUDES/header.php';
require_once '../INCLUDES/menu.php';
?>

<body>

    <h1 class=".text-primary"> Une question? Plus d' <span class="darkred">informations</span>?</h1>

    <main class="mainContact">
        <div class="contactForm">
            <form>
                <fieldset>
                    <legend>Ecrivez-nous !</legend>
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="text" readonly="" class="form-control-plaintext" id="staticEmail" value="email@example.com">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1" class="form-label mt-4">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>

                    <div class="form-group">
                        <label for="exampleTextarea" class="form-label mt-4">Example textarea</label>
                        <textarea class="form-control" id="exampleTextarea" rows="3"></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">J'envoie!</button>
                </fieldset>
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