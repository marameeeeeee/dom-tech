<?php
include "../controller/EvenementC.php";

$c = new EvenementC();
$tab = $c->listEvenement();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Evenements</title>
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

        .btn-participation {
            background-color: #28a745;
            color: #fff;
            padding: 5px 10px;
            border: none;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            margin-top: 10px;
        }

        .btn-participation:hover {
            background-color: #218838;
        }
        .return-btn {
            display: inline-block;
            padding: 8px 16px;
            background-color: #333;
            color: #fff;
            text-decoration: none;
            border: none;
            border-radius: 4px;
        }

        .return-btn:hover {
            background-color: #555;
        }
        
    </style>
</head>
<body>
    
    <div class="container mt-200">
        <center>
            <h1>Liste des événements</h1>
            <h2>
                <a href="addEvenement.php">Ajouter un événement</a>
            </h2>
        </center>
        <table border="1" align="center" width="70%">
            <tr>
                <th>Id</th>
                <th>nom_event</th>
                <th>Adresse</th>
                <th>Temps</th>
                <th>Type</th>
              
                <th>Update</th>
                <th>Delete</th>
            </tr>

            <?php foreach ($tab as $evenement): ?>
                <tr>
                    <td><?= $evenement['id']; ?></td>
                    <td><?= $evenement['nom_event']; ?></td>
                    <td><?= $evenement['adresse']; ?></td>
                    <td><?= $evenement['temps']; ?></td>
                    <td><?= $evenement['type']; ?></td>
                   
                    <td align="center">
                        <form method="POST" action="updateEvenement.php">
                            <input type="hidden" name="id" value="<?= $evenement['id']; ?>">
                            <input type="submit" name="update" value="Update">
                        </form>
                    </td>
                    <td>
                        <form method="POST" action="deleteEvenement.php">
                            <input type="hidden" name="id" value="<?= $evenement['id']; ?>">
                            <input type="submit" name="delete" value="Delete">
                        </form>
                    </td>
                </tr>
               
                <td>
            
        </td>

            <?php endforeach; ?>
           
            
        </table>

        <!-- Ajout du bouton Nombre de Participations -->
        <a href="detailEvenement.php" class="btn-participation">Nombre de Participations</a>

        <!-- Ajout du lien vers la page des événements à venir -->
        <a href="events.php" class="btn-participation"> Evénements à venir</a>
        <!-- Ajout du lien vers la page des événements à venir -->
        <a href="closedEvents.php" class="btn-participation"> Evénements passées</a>
        <a href="formulaire_paticipation.php" class="btn-participation"> formulaire de participation </a>
        <a href="http://localhost/Conservatoire/phpCRUD/phpEmail/email.php" class="btn-participation">confirmation mail</a>

    </div>
    <a href="indexad.php" class="return-btn">Back to Profile</a>
    <?php include 'footer.php'; ?>
    
</body>
</html>
