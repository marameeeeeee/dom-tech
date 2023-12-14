<?php
if (isset($_GET['id_rv'])) {
    try {
        include_once '../controller/RdvC.php';
        $rdvController = new RdvC();

        $id_rv = $_GET['id_rv'];
        $rdvController->deleteRdv($id_rv);

        echo '<script>alert("Suppression terminée");</script>';
        header("Location: listRdvs.php");
        exit();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo '<script>alert("ID manquant pour la suppression")</script>';
}
?>
