<?php
include "../controller/instrumentsC.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $instrumentId = $_POST['instrumentId'];

    $c = new insC();
    $c->incrementDislikes($instrumentId);

    // Renvoyer le nouveau nombre de dislikes à afficher sur la page
    echo $c->getDislikesCount($instrumentId);
}
?>
