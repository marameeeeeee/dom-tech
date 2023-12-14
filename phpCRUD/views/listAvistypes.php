<?php
include '../Controller/AvisC.php';

$avisC = new AvisC();
$avisList = $avisC->listAvis();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Avis</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #333;
            color: #fff;
            padding: 10px;
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
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
    <header>
        <h1>Liste des Avis</h1>
        <h2><a href="addAvistype.php">Ajouter un Avis</a></h2>
    </header>

    <div class="container mt-200">
        <center>
            <?php if (!empty($avisList)) : ?>
                <h3>Liste des Avis :</h3>
                <table border="1" align="center" width="70%">
                    <tr>
                        <th>ID Avis</th>
                        <th>Commentaires</th>
                        <th>Note</th>
                    </tr>

                    <?php foreach ($avisList as $avis) : ?>
                        <tr>
                            <td><?= $avis['id_user']; ?></td>
                            <td><?= $avis['commentaires']; ?></td>
                            <td><?= $avis['note']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            <?php else : ?>
                <p>Aucun avis trouvé.</p>
            <?php endif; ?>
        </center>
    </div>
</body>

</html>