<?php 
    include '../Controller/instrumentsC.php';
    $joueurC=new insC();
    $joueurC->deleteinstruments($_POST['id_in']);
    header('Location: lisinstruments.php');





?>