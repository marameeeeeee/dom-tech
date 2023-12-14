<?php
include '../Controller/EvenementC.php';
$clientC = new EvenementC();
$clientC->deleteEvenement($_POST["id"]);
header('Location:listEvenement.php');
?>