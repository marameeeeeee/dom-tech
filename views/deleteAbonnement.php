
<?php
include "../controller/AbonnementC.php";

if(isset($_GET['id'])) {
    $idToDelete = $_GET['id'];
    $c = new AbonnementC();
    $c->deleteAbonnement($idToDelete);
    header('Location: ListAbonnement.php'); // Redirect to the list after deletion
} else {
    echo "No ID specified for deletion.";
}
?>

