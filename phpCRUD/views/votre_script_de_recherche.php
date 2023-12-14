<?php
require '../config.php';

try {
    $pdo = config::getConnexion();

    // Vérifie si une recherche a été effectuée
    if (isset($_GET['search'])) {
        $search = $_GET['search'];
        
        // Requête pour chercher l'utilisateur correspondant à la recherche
        $stmt = $pdo->prepare("SELECT * FROM tb_user WHERE nom LIKE :search OR email LIKE :search");
        $stmt->bindValue(':search', '%' . $search . '%');
        $stmt->execute();
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } else {
        // Requête pour sélectionner toutes les lignes de la table tb_user
        $stmt = $pdo->query("SELECT * FROM tb_user");
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
} catch (PDOException $e) {
    echo "Erreur: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Liste des Utilisateurs</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            margin-top: 20px;
        }

        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }

        th, td {
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #333;
            color: #fff;
        }

        tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tbody tr:hover {
            background-color: #e0e0e0;
        }
        .btn-retour {
            display: inline-block;
            padding: 10px 20px;
            background-color: #000;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
            margin: 10px;
        }

        .btn-retour:hover {
            background-color: #333;
        }
    </style>
</head>
<body>
    <h1>Liste des Utilisateurs</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Email</th>
                <th>Status</th>
                <th>Profile Photo</th>
                <th>User Type</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user) : ?>
                <tr>
                    <td><?php echo $user['id']; ?></td>
                    <td><?php echo $user['nom']; ?></td>
                    <td><?php echo $user['email']; ?></td>
                    <td><?php echo $user['status']; ?></td>
                    <td><?php echo $user['profile_photo']; ?></td>
                    <td><?php echo $user['usertype']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <a href="test.php" class="btn-retour">Retourner</a>
    <!-- Le reste de votre code HTML -->
</body>
</html>
