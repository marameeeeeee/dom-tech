<?php
require '../config.php';

if (isset($_GET['token'])) {
    $token = $_GET['token'];

    // Récupération de la connexion PDO depuis la classe config
    $pdo = config::getConnexion();

    $stmt = $pdo->prepare("SELECT * FROM tb_user WHERE reset_token = :token");
    $stmt->bindParam(':token', $token);
    $stmt->execute();
    $row = $stmt->fetch();

    if ($row) {
        $tokenCreationTime = strtotime($row['token_creation_time']);
        $tokenExpirationTime = $tokenCreationTime + (60 * 500); // Temps d'expiration du token : 1 heure

        if (isset($_POST['submit'])) {
            $newPassword = $_POST['new_password'];
            $confirmPassword = $_POST['confirm_password'];

            if ($newPassword === $confirmPassword) {
                $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
                // Mettre à jour le mot de passe de l'utilisateur dans la base de données
                $updatePasswordStmt = $pdo->prepare("UPDATE tb_user SET password = :password, reset_token = NULL WHERE reset_token = :token");
                $updatePasswordStmt->bindParam(':password', $hashedPassword);
                $updatePasswordStmt->bindParam(':token', $token);
                $updatePasswordStmt->execute();
                echo "<script>alert('Réinitialisation du mot de passe réussie'); window.location.href = 'login.php';</script>";
            } else {
                echo "<script>alert('Les mots de passe ne correspondent pas');</script>";
            }
        }
    } else {
        echo "<script>alert('Token invalide');</script>";
    }
} else {
    echo "<script>alert('Token non trouvé');</script>";
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Réinitialiser le mot de passe</title>
    <!-- Ajoutez vos liens CSS ici -->
    <style>
        /* Vos styles CSS */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        header,
        footer {
            padding: 30px;
        }

        h2 {
            margin-top: 60px;
        }

        form {
            margin-top: 20px;
            display: flex;
            flex-direction: column;
            max-width: 400px;
        }

        label,
        input {
            margin-bottom: 10px;
        }

        button {
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <?php include 'header.php'; ?>
    <main>
        <h2>Réinitialiser le mot de passe</h2>
        <form action="" method="post">
            <label for="new_password">Nouveau mot de passe :</label>
            <input type="password" name="new_password" required>
            <label for="confirm_password">Confirmez le nouveau mot de passe :</label>
            <input type="password" name="confirm_password" required>
            <button type="submit" name="submit">Réinitialiser le mot de passe</button>
        </form>
    </main>
    <footer>
        <?php include 'footer.php'; ?>
    </footer>
</body>
</html>
