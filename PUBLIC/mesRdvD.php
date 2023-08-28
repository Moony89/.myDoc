<?php
session_start();

if ($_SESSION["USER"]["roles"] != "DOC") {
    header('location:./connexionD.php');
    exit();
} else {

    $idDoc = $_SESSION["USER"]["idDoctor"];

    try{

    require_once "../BDD/connect_BDD.php";

    $pdo = new PDO($attr, $user, $pass, $opts);

    $sql = " SELECT * FROM RDV WHERE RDV.idDoctor = $idDoc ";

    $query = $pdo->query($sql);

    $rdvs = $query->fetchAll();


    $sql = "SELECT * FROM Patients INNER JOIN RDV ON RDV.idPatient = Patients.idPatient ";

    $query = $pdo->query($sql);

    $patient = $query->fetch();
    }catch (PDOException $e) {
        throw new PDOException($e->getMessage(), (int)$e->getCode());
    }

    $titre = 'Mes RDV';

    require_once '../INCLUDES/header.php';
    require_once "../INCLUDES/menu.php";

?>

    <h2>Bonjour, Dr <span class="darkred"><?= $_SESSION["USER"]["name"] ?></span></h2>

    <div class="dashboardD">

    <?php require_once "../INCLUDES/menu_aside_medecin.php"; ?>
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
                        <td>
                            <?= $patient["surnameP"] ?>
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