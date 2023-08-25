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

    $sql = " SELECT * FROM rdv WHERE rdv.idDoctor = $idDoc ";

    $query = $pdo->query($sql);

    $rdvs = $query->fetchAll();


    $sql = "SELECT * FROM patients INNER JOIN rdv ON rdv.idPatient = patients.idPatient ";

    $query = $pdo->query($sql);

    $patient = $query->fetchAll();
    }catch (PDOException $e) {
        throw new PDOException($e->getMessage(), (int)$e->getCode());
    }

    $titre = 'Mes RDV';

    require_once '../INCLUDES/header.php';
    require_once "../INCLUDES/menu.php";

?>

    <h2>Bonjour, Dr <span class="darkred"><?= $_SESSION["doctor"]["name"] ?></span></h2>

    <div class="dashboardD">

        <div class="menu_dashboardD">

            <a href="./mesPatients.php"><button type="button" class="btn btn-primary btn-lg ">Mes Patients</button></a>
            <a href="./mesrdvD.php"><button type="button" class="btn btn-primary btn-lg active">Mes RDV</button></a>
            <a href="./monCompteD.php"><button type="button" class="btn btn-primary btn-lg">Mon Compte</button></a>
            <a href="./deconnexion.php"><button type="button" class="btn btn-primary btn-lg">Deconnexion</button></a>

        </div>
        <table>
            <tbody>
                <tr>
                    <th scope="row">DATE</th>
                    <th scope="row">HEURE</th>
                    <th scope="row">PATIENT</th>

                </tr>

                <?php foreach ($rdvs as $rdv) : ?>


                    <tr>
                        <td>
                            <?= $rdv["date"] ?>

                        </td>
                        <td>
                            <?= $rdv["heure"] ?>
                        </td>
                        <td>
                            <?= $patient["nameP"] ?>
                        </td>

                    </tr>
            </tbody>
        </table>

    <?php endforeach; ?>

    </div>

<?php
    require_once "../INCLUDES/footer.php";
}
?>