<?php

    session_start();

    //On supprime la variable

    unset($_SESSION["USER"]);
    

    header("Location: ../../PUBLIC/index.php");

?>