<?php
session_start();
$titre = "Mes documents";
require_once '../INCLUDES/header.php';

?>

<body>

<?php
require_once '../INCLUDES/menu.php';
?>

<main class="dashboardP">

<?php require_once "../INCLUDES/menu_aside_patient.php";?>

        <div class="affListPatient">
            
        </div>

    </main>


<?php
require_once '../INCLUDES/footer.php';
?>

</body>