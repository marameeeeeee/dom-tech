<?php
include '../Controller/JoueurC.php';
$clientC = new JoueurC();
$clientC->deleteJoueur($_POST["id_event"]);
header('Location:listJoueurs.php');
?>