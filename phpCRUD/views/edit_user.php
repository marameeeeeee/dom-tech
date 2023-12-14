<?php
require '../config.php';

// Vérifiez si l'ID de l'utilisateur est passé dans l'URL
if (isset($_GET['id'])) {
    $userId = $_GET['id'];

    try {
        $pdo = config::getConnexion();

        // Sélectionnez les données de l'utilisateur spécifié par son ID
        $stmt = $pdo->prepare("SELECT * FROM tb_user WHERE id = ?");
        $stmt->execute([$userId]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$user) {
            echo "Utilisateur non trouvé.";
            exit();
        }
    } catch (PDOException $e) {
        echo "Erreur: " . $e->getMessage();
    }
} else {
    echo "ID d'utilisateur non spécifié.";
    exit();
}

// Traitement du formulaire de modification
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérez les données du formulaire
    $newName = $_POST['nom'];
    $newEmail = $_POST['email'];
    // ... récupérez d'autres champs et effectuez les validations nécessaires ...

    try {
        // Effectuez la mise à jour des données de l'utilisateur dans la base de données
        $updateStmt = $pdo->prepare("UPDATE tb_user SET nom = ?, email = ? WHERE id = ?");
        $updateStmt->execute([$newName, $newEmail, $userId]);

        header("Location: test.php");
        exit();
    } catch (PDOException $e) {
        echo "Erreur lors de la mise à jour: " . $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Modifier Utilisateur</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
        }

        form {
            max-width: 400px;
            background-color: #fff;
            padding: 20px;
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
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        input[type="submit"] {
            padding: 10px 20px;
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
    <form method="post">
        <h1>Modifier Utilisateur</h1>
        <label for="nom">Nom:</label>
        <input type="text" name="nom" value="<?php echo $user['nom']; ?>">

        <label for="email">Email:</label>
        <input type="email" name="email" value="<?php echo $user['email']; ?>">

        <label for="status">Status:</label>
        <input type="text" name="status" value="<?php echo $user['status']; ?>">

        <label for="profile_photo">Profile Photo:</label>
        <input type="text" name="profile_photo" value="<?php echo $user['profile_photo']; ?>">

        <label for="usertype">User Type:</label>
        <input type="text" name="usertype" value="<?php echo $user['usertype']; ?>">

        <input type="submit" value="Enregistrer">
    </form>
</body>
</html>