<?php
// Inclure le fichier de configuration et initialiser la session
require '../config.php';
session_start();

if (empty($_SESSION["id"])) {
    header("Location: login.php");
    exit();
}

// Obtenez la connexion PDO en utilisant la méthode getConnexion() de la classe config
$pdo = config::getConnexion();

// Vérifier si la requête est un POST et si le bouton 'like' est présent
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['like'])) {
    // Vérifier si $pdo est défini (connexion à la base de données)
    if (isset($pdo)) {
        $userId = $_SESSION["id"];
        $imageId = $_POST['image_id'];

        // Vérifier si l'utilisateur n'a pas déjà liké cette image
        $checkStmt = $pdo->prepare("SELECT * FROM likes WHERE user_id= ? AND image_id= ?");
        $checkStmt->execute([$userId, $imageId]);
        $existingLike = $checkStmt->fetch();

        if (!$existingLike) {
            $insertStmt = $pdo->prepare("INSERT INTO likes (user_id, image_id) VALUES (?, ?)");
            $insertStmt->execute([$userId, $imageId]);
        }
        
        header("Location: other_users_gallery.php");
        exit();
    } else {
        // Gérer le cas où $pdo n'est pas défini (connexion à la base de données non établie)
        echo "Erreur de connexion à la base de données";
        // Vous pouvez rediriger l'utilisateur vers une page d'erreur ou effectuer d'autres actions nécessaires
    }
}
?>
