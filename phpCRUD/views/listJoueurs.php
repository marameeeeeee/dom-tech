<?php
include "../controller/JoueurC.php";

$c = new JoueurC();
$tab = $c->listJoueurs();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>types des evenements</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        center {
            text-align: center;
        }

        h1 {
            color: #333;
        }

        h2 a {
            color: #007bff;
            text-decoration: none;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        form {
            display: inline-block;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            padding: 5px 10px;
            border: none;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <?php include 'header.php'; ?>
    <div class="container mt-200">
        <center>
            <h1>Liste des evenements</h1>
            <h2>
                <a href="addJoueur.php">Add event</a>
            </h2>
        </center>
        <table border="1" align="center" width="70%">
            <tr>
                <th>Id event</th>
                <th>Nom</th>
                <th>Type</th>
                <th>Description</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>

            <?php
            foreach ($tab as $joueur) {
            ?>
                <tr>
                    <td><?= $joueur['id_event']; ?></td>
                    <td><?= $joueur['nom']; ?></td>
                    <td><?= $joueur['type']; ?></td>
                    <td><?= $joueur['description']; ?></td>
                    <td align="center">
                        <form method="POST" action="updateJoueur.php">
                        <input type="hidden" name="id_event" value="<?= $joueur['id_event']; ?>">
                            
                            <input type="submit" name="update" value="Update">
                        </form>
                    </td>
                    <td>
                        <form method="POST" action="deleteJoueur.php">
                            <input type="hidden" name="id_event" value="<?= $joueur['id_event']; ?>">
                            <input type="submit" name="delete" value="Delete">
                        </form>
                    </td>
                </tr>
            <?php
            }
            ?>
        </table>
    </div>
    <?php include 'footer.php'; ?>
</body>
</html>
