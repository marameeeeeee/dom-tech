<?php
require '../config.php';

try {
    $pdo = config::getConnexion();

    // Requête pour sélectionner toutes les lignes de la table tb_user
    $stmt = $pdo->query("SELECT * FROM tb_user");
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
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

        header, footer {
            background-color: #333;
            color: #fff;
            padding: 10px;
            text-align: center;
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

        table th, table td {
            padding: 10px;
            border: 1px solid #ccc;
        }

        table th {
            background-color: #333;
            color: #fff;
        }

        table tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        table tbody tr:hover {
            background-color: #e0e0e0;
        }

        footer {
            position: fixed;
            bottom: 0;
            width: 100%;
        }
        a {
        display: inline-block;
        padding: 8px 20px;
        background-color: #000; /* Fond noir */
        color: #fff; /* Texte blanc */
        border: none;
        border-radius: 5px;
        text-decoration: none;
        transition: background-color 0.3s ease;
        margin: 5px;
    }

    a:hover {
        background-color: #333; /* Fond légèrement plus foncé au survol */
    }
    .btn {
            display: inline-block;
            padding: 8px 20px;
            background-color: #000;
            color: #fff;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s ease;
            margin: 5px;
        }

        .btn:hover {
            background-color: #333;
        }
        #myChart {
    width: 80%;
    height: 400px;
    margin: 20px auto 70px; /* Ajout d'une marge inférieure de 50px pour plus d'espace */
    display: block;
}
input[type="text"] {
            padding: 8px;
            border-radius: 5px;
            border: 1px solid #ccc;
            margin-right: 10px;
        }

        input[type="submit"] {
            padding: 8px 20px;
            background-color: #000;
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
    
    <h1>Liste des Utilisateurs</h1>
    <form method="GET" action="votre_script_de_recherche.php">
    <input type="text" name="search" placeholder="Rechercher un utilisateur...">
    <input type="submit" value="Rechercher">
</form>

    <table>
    <thead>
    <tr>
        <th>ID</th>
        <th>Nom</th>
        <th>Email</th>
        <th>Status</th>
        <th>Profile Photo</th>
        <th>User Type</th>
        <th>Last Time Connected</th> <!-- Ajout de la colonne -->
        <th>Action</th>
        <!-- Ajoutez d'autres colonnes en fonction des champs de votre table -->
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
            <td><?php echo $user['last_time_connected']; ?></td> <!-- Affichage de la dernière connexion -->
            <td>
                <a href="edit_user.php?id=<?php echo $user['id']; ?>">Modifier</a>
                <a href="delete_user.php?id=<?php echo $user['id']; ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?')">Supprimer</a>
                <a href="add_user.php" class="btn">Ajouter un Utilisateur</a> 
            </td>
        </tr>
    <?php endforeach; ?>

</table>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<canvas id="myChart" width="10" height="5"></canvas>
<script>
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
            datasets: [{
                label: 'Taux des élèves',
                data: [10, 20, 18, 35, 40, 35],
                fill: false,
                borderColor: 'rgb(75, 192, 192)',
                tension: 0.15
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
    
<footer>
    <a href="indexad.php">Retourner au Profil</a>
</footer>
</body>
</html>
