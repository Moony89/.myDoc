<?php
session_start();



if ($_SESSION["doctor"]["roles"] != "DOC") {
    header('location:./connexionD.php');
    exit();

} else {

    $idDoc = $_SESSION["doctor"]["idDoctor"];

    try{

    require_once "../BDD/connect_BDD.php";

    $pdo = new PDO($attr, $user, $pass, $opts);

    $sql = " SELECT * FROM patients INNER JOIN doctors ON doctors.idDoctor = patients.idDoctor WHERE doctors.idDoctor = $idDoc ";

    $query = $pdo->query($sql);

    $patients = $query->fetchAll();
    }catch (PDOException $e) {
        throw new PDOException($e->getMessage(), (int)$e->getCode());
    }
    $titre = 'Mes Patients';

    require_once '../INCLUDES/header.php';
    require_once "../INCLUDES/menu.php";

   
?>

    <body>

        <h2>Bonjour, Dr <span class="darkred"><?= $_SESSION["doctor"]["name"] ?></span></h2>

        <h3 class="bg-primary text-light">Mes Patients</h3>

        <div class="dashboardD">

            <div class="menu_dashboardD">
            <a href="./mesPatients.php"><button type="button" class="btn btn-primary btn-lg active">Mes Patients</button></a>
                <a href="./mesrdvD.php"><button type="button" class="btn btn-primary btn-lg">Mes RDV</button></a>
                <a href="./monCompteD.php"><button type="button" class="btn btn-primary btn-lg">Mon Compte</button></a>
                <a href="./deconnexion.php"><button type="button" class="btn btn-primary btn-lg">Deconnexion</button></a>

            </div>
            <table class="table_patient">
                <tbody>
                    <tr>
                        <th scope="row">NOM</th>
                        <th scope="row">PRENOM</th>
                        <th scope="row">N° SECURITE SOCIALE</th>
                        <th scope="row">TELEPHONE</th>
                        <th scope="row"></th>

                    </tr>
            <?php foreach($patients as $patient): ?>

                    <tr>
                        <th scope="row"><?=$patient["nameP"]?></th>
                        <td><?=$patient["surnameP"]?></td>
                        <td><?=$patient["numSecuriteSociale"]?></td>
                        <td><?=$patient["phone"]?></td>
                        <td><a href="./fichePatient.php?id=<?=$patient["idPatient"]?>"><button class="btn btn-primary">Voir</button></a></td>
                    </tr>
                    

            <?php endforeach; ?>
                
            </tbody> 
               
            </table>

        </div>

        <a href="./ajoutPatient.php"><button type="button" class="btn btn-primary btn-lg">Ajouter un Patient</button></a>

    </body>

<?php
    require_once "../INCLUDES/footer.php";
}
?>