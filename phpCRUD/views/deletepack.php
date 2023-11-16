

<?php
include "../controller/PacksC.php";

if(isset($_GET['id'])) {
    $idToDelete = $_GET['id'];
    $c = new PackC();
    $c->deletePack($idToDelete);
    header('Location: listpacks.php'); // Redirect to the list after deletion
} else {
    echo "No ID specified for deletion.";
}
?>

