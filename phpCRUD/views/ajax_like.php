<?php
include "../controller/instrumentsC.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $instrumentId = $_POST['instrumentId'];

    $c = new insC();
    $c->incrementLikes($instrumentId);

    // Renvoyer le nouveau nombre de likes à afficher sur la page
    echo $c->getLikesCount($instrumentId);
}
?>
