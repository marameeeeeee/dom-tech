<?php
require '../config.php';

if (isset($_GET['id'])) {
    $userId = $_GET['id'];

    try {
        $pdo = config::getConnexion();

        // Supprimez l'utilisateur correspondant à l'ID spécifié
        $deleteStmt = $pdo->prepare("DELETE FROM tb_user WHERE id = ?");
        $deleteStmt->execute([$userId]);

        header("Location: test.php");
        exit();
    } catch (PDOException $e) {
        echo "Erreur lors de la suppression: " . $e->getMessage();
    }
} else {
    echo "ID d'utilisateur non spécifié.";
    exit();
}
?>
