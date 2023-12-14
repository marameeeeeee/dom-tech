<!-- like.php -->
<?php
include "../controller/instrumentsC.php";

if (isset($_POST["like"]) && isset($_POST["id_in"])) {
    $id = $_POST["id_in"];
    $c = new insC();
    $c->updateLikes($id);
    header('Location: displayinstruments.php');
}
?>

<!-- dislike.php -->
<?php
include "../controller/instrumentsC.php";

if (isset($_POST["dislike"]) && isset($_POST["id_in"])) {
    $id = $_POST["id_in"];
    $c = new insC();
    $c->updateDislikes($id);
    header('Location: displayinstruments.php');
}
?>
