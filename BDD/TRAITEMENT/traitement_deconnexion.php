<?php

    session_start();

    //On supprime la variable

    unset($_SESSION["patient"]);
    unset($_SESSION["doctor"]);

    header("Location: ../../PUBLIC/index.php");

?>