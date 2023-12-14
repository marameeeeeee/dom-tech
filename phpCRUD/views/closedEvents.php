<?php
include '../Controller/EvenementC.php';

$evenementC = new EvenementC();
$closedEvents = $evenementC->getClosedEvents();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Événements Passés</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #000; /* Fond noir */
            color: #fff; /* Texte blanc */
            margin: 0;
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 110vh;
        }

        h1 {
            color: #fff; /* Texte blanc */
            font-size: 2em;
            font-weight: bold;
            text-transform: uppercase;
            border-bottom: 2px solid #008080;
            padding-bottom: 10px;
            margin-bottom: 20px;
            letter-spacing: 2px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
            background: linear-gradient(to right, #000, #111);
            display: inline-block;
            border-radius: 10px;
            padding: 15px 20px;
        }

        p {
            margin: 30px 0;
            font-size: 16px;
            line-height: 1.6;
            color: #ccc; /* Texte gris clair pour une meilleure lisibilité */
        }

        .upcoming-event {
            font-weight: bold;
            color: #E44D26;
        }

        #events-container {
            width: 60%;
            background-color: #000; /* Fond noir pour le conteneur */
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        header {
            align-self: flex-start;
        }
    </style>
</head>
<body>

    <?php include 'header.php'; ?>
    <h1>Événements Passés</h1>

    <?php if ($closedEvents): ?>
        <ul>
            <?php foreach ($closedEvents as $event): ?>
                <li>
                    <strong>Nom de l'événement:</strong> <?= $event['nom_event']; ?>
                    <br>
                    <strong>Date de l'événement:</strong> <?= $event['temps']; ?>
                    <!-- Ajoutez d'autres détails de l'événement selon vos besoins -->
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>Aucun événement passé n'a été trouvé.</p>
    <?php endif; ?>
    <?php include 'footer.php'; ?>
    <!-- Ajoutez d'autres éléments de la page selon vos besoins -->
</body>
</html>
