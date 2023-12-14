<?php 
    include '../Controller/typesC.php';
    $joueurC=new typeC();
    $joueurC->deletetypes($_POST['id_type']);
    header('Location: listtypes.php');





?>