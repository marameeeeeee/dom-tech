<?php
include '../Controller/EvenementtypeC.php';
$clientC = new EvenementtypeC();
$clientC->deleteEvenementtype($_POST["id_event"]);
header('Location:listEvenementtypes.php');
?>