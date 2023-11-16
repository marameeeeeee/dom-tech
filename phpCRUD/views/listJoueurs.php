<?php
include "../controller/JoueurC.php";

$c = new typeC();
$tab = $c->listJoueurs();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des types d'instruments</title>
    <!-- Add your CSS styles here -->
    <style>
        body {
            background-color: #f8f9fa; /* Set a light background color */
        }
        .container {
            margin-top: 150px; /* Increased margin-top for moving components lower */
        }
        h1 {
            color: #28a745; /* Set title color to a success color */
            text-align: center;
        }
        h2 a {
            color: #007bff; /* Set link color to a primary color */
        }
        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px; /* Add some space between title and table */
        }
        th, td {
            border: 1px solid #dee2e6;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #007bff;
            color: #ffffff;
        }
        td {
            background-color: #ffffff;
        }
        form {
            display: inline; /* Display form elements inline */
        }
        input[type="submit"] {
            background-color: #28a745; /* Set button color to a success color */
            color: #ffffff;
            padding: 5px 10px;
            border: none;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <?php include 'header.php'; ?>
    <div class="container">
        <h1>Liste des types d'instruments</h1>
        <h2>
            <a href="addJoueur.php">Ajouter un type d'instruments</a>
        </h2>
        <table>
            <tr>
                <th>Id type</th>
                <th>Titre</th>
                <th>Descriptions</th>
                <th>Actions</th>
            </tr>
            <?php foreach ($tab as $joueur) { ?>
                <tr>
                    <td><?= $joueur['id_type']; ?></td>
                    <td><?= $joueur['titre']; ?></td>
                    <td><?= $joueur['descriptions']; ?></td>
                    <td>
                        <form method="POST" action="updateJoueur.php">
                            <input type="hidden" name="id_type" value="<?= $joueur['id_type']; ?>">
                            <input type="submit" name="update" value="Update">
                        </form>
                        <form method="POST" action="deleteJoueur.php">
                            <input type="hidden" name="id_type" value="<?= $joueur['id_type']; ?>">
                            <input type="submit" name="delete" value="Delete">
                        </form>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </div>
    <?php include 'footer.php'; ?>
</body>
</html>
