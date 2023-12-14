<?php
require_once '../Controller/EvenementC.php';
require_once '../Controller/ParticipationC.php';

if (isset($_GET['id'])) {
    $event_id = $_GET['id'];
    $evenementC = new EvenementC();
    $participant_id = 1; // Remplacez ceci par l'ID du participant, récupérez-le selon votre logique
    $participant_email = "participant@example.com";
    $participationC = new ParticipationC();
    
    // Ajoutez la participation et envoyez l'e-mail
    $participationC->addParticipation($event_id, $participant_id, $participant_email);

    // Récupérez le nombre de participants
    $participantsCount = $evenementC->getParticipantsCount($event_id);
} else {
    // Gérez le cas où l'ID de l'événement n'est pas spécifié
    // Redirigez l'utilisateur ou affichez un message d'erreur, selon votre logique
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'header.php'; ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calcul du nombre de participants</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f7f7f7;
            color: #333;
            margin: 0;
            padding: 0;
            text-align: center;
        }

        header {
            background-color: #008080;
            color: #fff;
            padding: 10px 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: fixed;
            top: 0;
            width: 100%;
        }

        h1 {
            color: #008080;
            margin-top: 80px;
        }

        p {
            margin: 15px 0;
            font-size: 18px;
            color: #333;
        }

        a {
            text-decoration: none;
            color: #008080;
            font-weight: bold;
            transition: color 0.3s ease;
        }

        a:hover {
            color: #005757;
        }

        footer {
            background-color: #008080;
            color: #fff;
            padding: 10px 0;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>
    <h1>Calcul du nombre de participants</h1>
    
    <?php if (isset($participantsCount)): ?>
        <p>Nombre de participants à l'événement: <?= $participantsCount; ?></p>
        
        <!-- Ajoutez un lien stylisé vers la page du graphe ici -->
        <a href="statsParticipants.php?id=<?= $event_id; ?>" style="background-color: #008080; color: #fff; padding: 10px 20px; border-radius: 5px; text-decoration: none;">Voir les statistiques sous forme de graphe</a>
    <?php else: ?>
        <p>L'ID de l'événement n'est pas spécifié.</p>
    <?php endif; ?>
    <?php include 'footer.php'; ?>
    <!-- Ajoutez d'autres éléments de la page selon vos besoins -->
</body>
</html>
