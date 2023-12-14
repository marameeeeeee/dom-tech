
<?php
require '../config.php';
// Vérifie si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Assurez-vous de récupérer et de valider les données correctement avant de les utiliser
    $newName = $_POST['nom'] ?? '';
    $newEmail = $_POST['email'] ?? '';
    $newStatus = $_POST['status'] ?? '';
    $newProfilePhoto = $_POST['profile_photo'] ?? '';
    $newUserType = $_POST['usertype'] ?? '';

    // Insérez les données dans la base de données
    try {
        $pdo = config::getConnexion();
        $insertStmt = $pdo->prepare("INSERT INTO tb_user (nom, email, status, profile_photo, usertype) VALUES (?, ?, ?, ?, ?)");
        $insertStmt->execute([$newName, $newEmail, $newStatus, $newProfilePhoto, $newUserType]);

        // Redirige vers la liste des utilisateurs après l'ajout
        header("Location: indexad.php");
        exit();
    } catch (PDOException $e) {
        echo "Erreur lors de l'ajout: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ajouter un Utilisateur</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f6f6f6;
            color: #333;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        h1 {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 20px 0;
        }

        form {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="email"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        input[type="submit"] {
            padding: 8px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h1>Ajouter un Utilisateur</h1>
    <form method="post">
        <label for="nom">Nom:</label>
        <input type="text" name="nom">

        <label for="email">Email:</label>
        <input type="email" name="email">

        <label for="status">Status:</label>
        <input type="text" name="status">

        <label for="profile_photo">Profile Photo:</label>
        <input type="text" name="profile_photo">

        <label for="usertype">User Type:</label>
        <input type="text" name="usertype">

        <!-- Ajoutez d'autres champs ici -->

        <input type="submit" value="Ajouter">
    </form>
</body>
</html>

