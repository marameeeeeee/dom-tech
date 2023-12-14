<?php
include '../Controller/CourstypeC.php';

// Instanciez le contrôleur de cours
$courstypeC = new CourstypeC();

// Récupérez la liste des cours depuis la base de données
$courses = $courstypeC->listCourstypes();

// Retournez les cours au format JSON
echo json_encode($courses);
?>
