<?php
require '../config.php'; 

session_start();
if (empty($_SESSION["id"])) {
    header("Location: login.php");
    exit();
}

$id = $_SESSION["id"];

if(isset($_POST['submit_info'])) {
    $age = $_POST['age'];
    $sex = $_POST['sex'];

    // Mettre à jour les données dans la base de données
    $stmt = $conn->prepare("UPDATE tb_user SET age = ?, sex = ? WHERE id = ?");
    $stmt->bind_param("isi", $age, $sex, $id);
    $stmt->execute();

    // Redirection vers la page de profil
    header("Location: index.php");
    exit();
}
?>
