
<?php
include "../controller/PacksC.php";

if(isset($_GET['id'])) {
    $idToDelete = $_GET['id'];
    $c = new PackC();
    $c->DeletePack($idToDelete);
    header('Location: ListPack.php'); // Redirect to the list after deletion
} else {
    echo "No ID specified for deletion.";
}
?>

