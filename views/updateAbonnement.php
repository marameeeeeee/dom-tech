<?php

include '../Controller/AbonnementC.php';
include '../model/Abonnement.php';
$error = "";
$abonnement = null;
$AbonnementC = new AbonnementC();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_user = $_POST['id_user'] ?? '';
    $types = $_POST['types'] ?? '';
    $date_deb = $_POST['date_deb'] ?? '';
    $date_fin = $_POST['date_fin'] ?? '';
    $status = $_POST['status'] ?? '';
    $payed = $_POST['payed'] ?? '';

    if (!empty($id_user) && !empty($types) && !empty($date_deb) && !empty($date_fin) && !empty($status) && !empty($payed)) {
        $abonnement = new Abonnement(
            null,
            (int)$id_user,
            (int)$types,
            $date_deb,
            $date_fin,
            $status,
            (int)$payed,
        );
    

        $AbonnementC->updateAbonnement($abonnement, $_POST['id_ab']);

        header('Location:ListAbonnement.php');
        exit();
    } else {
        $error = "Missing information";
    }
}

if (isset($_POST['id_ab'])) {
    $abonnement = $AbonnementC->showAbonnement($_POST['id_ab']);
}
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Display</title>
</head>

<body>
    <?php include 'header.php'; ?>
    <div class="container mt-200">
        <button><a href="ListAbonnement.php">Back to list</a></button>
        <hr>

        <div id="error">
            <?php echo $error; ?>
        </div>

        <?php
        if (isset($_POST['id_ab'])) {
            $abonnement = $AbonnementC->showAbonnement($_POST['id_ab']);
        ?>

            <form action="" method="POST">
                <table>
                    <tr>
                        <td><label for="id_ab">Id AB :</label></td>
                        <td>
                            <input type="text" id="id_ab" name="id_ab" value="<?php echo $_POST['id_ab'] ?>" readonly />
                            <span id="erreurId_ab" style="color: red"></span>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="id_user">ID USER :</label></td>
                        <td>
                            <input type="text" id="id_user" name="id_user" value="<?php echo $abonnement['id_user'] ?>" />
                            <span id="erreurID_user" style="color: red"></span>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="types"> Types :</label></td>
                        <td>
                            <input type="text" id="types" name="types" value="<?php echo $abonnement['types'] ?>" />
                            <span id="erreurTypes" style="color: red"></span>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="date_deb"> Date Debut :</label></td>
                        <td>
                            <input type="text" id="date_deb" name="date_deb" value="<?php echo $abonnement['date_deb'] ?>" />
                            <span id="erreurDatedeb" style="color: red"></span>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="date_fin"> Date fin :</label></td>
                        <td>
                            <input type="text" id="date_fin" name="date_fin" value="<?php echo $abonnement['date_fin'] ?>" />
                            <span id="erreurDatefin" style="color: red"></span>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="status"> Status :</label></td>
                        <td>
                            <input type="text" id="status" name="status" value="<?php echo $abonnement['status'] ?>" />
                            <span id="erreurStatus" style="color: red"></span>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="status"> Payed :</label></td>
                        <td>
                            <input type="text" id="payed" name="payed" value="<?php echo $abonnement['payed'] ?>" />
                            <span id="erreurPayed" style="color: red"></span>
                        </td>
                    </tr>

                    <td>
                        <input type="submit" value="Save">
                    </td>
                    <td>
                        <input type="reset" value="Reset">
                    </td>
                </table>

            </form>
    </div>
    <?php include 'footer.php'; ?>
<?php
        }
?>
</body>

</html>
