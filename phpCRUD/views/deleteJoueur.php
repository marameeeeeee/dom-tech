<?php 
    include '../Controller/JoueurC.php';
    $joueurC=new typeC();
    $joueurC->deleteJoueur($_POST['id_type']);
    header('Location: listJoueurs.php');





?>