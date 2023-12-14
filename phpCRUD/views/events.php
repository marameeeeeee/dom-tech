<?php
include '../Controller/EvenementC.php';

$c = new EvenementC();
$upcomingEvents = $c->getUpcomingEvents();
?>

<!DOCTYPE html>
<html lang="en">
<head>
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

<div id="events-container">
    <h1>Événements à venir:</h1>

    <?php
    // Affichez les événements à venir
    foreach ($upcomingEvents as $event) {
        $eventDate = strtotime($event['temps']);
        $currentDate = time();

        $daysDifference = round(($eventDate - $currentDate) / (60 * 60 * 24));

        $eventClass = ($daysDifference <= 2) ? 'upcoming-event' : '';

        echo '<p class="' . $eventClass . '">' . $event['nom_event'] . ' - ' . $event['temps'] . '</p>';
        
        // Ajoutez le lien "S'inscrire" pour chaque événement
        echo '<a href="http://localhost/Conservatoire/phpCRUD/views/formulaire_paticipation.php?nom_event=' . urlencode($event['nom_event']) . '">S\'inscrire</a>';
    }
    ?>
</div>

<?php include 'footer.php'; ?>

<!-- Ajoutez ici le reste de votre code HTML pour l'affichage des événements -->

</body>
</html>
