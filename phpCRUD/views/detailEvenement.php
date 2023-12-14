<?php
include '../Controller/EvenementC.php';

$evenementDetails = null;
$participantsCount = 0;
$error_message = null;

// Traitement du formulaire de recherche
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Valider l'ID de l'événement
    if (isset($_POST['event_id']) && is_numeric($_POST['event_id'])) {
        $event_id = $_POST['event_id'];
        $evenementC = new EvenementC();

        // Récupérer les détails de l'événement
        $evenementDetails = $evenementC->showEvenement($event_id);

        // Vérifier si l'événement existe
        if ($evenementDetails) {
            // Récupérer le nombre de participants
            $participantsCount = $evenementC->getParticipantsCount($event_id);
        } else {
            // Gérer le cas où l'événement n'existe pas
            $error_message = "L'événement avec l'ID $event_id n'existe pas.";
        }
    } else {
        // Gérer le cas où l'ID de l'événement n'est pas spécifié ou n'est pas valide
        $error_message = "Veuillez entrer un ID d'événement valide.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recherche d'événement par ID</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f2f2f2;
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

        header img {
            max-width: 100px;
            max-height: 40px;
            margin-left: 20px;
        }

        h1 {
            color: #008080;
            margin-top: 80px;
        }

        form {
            margin-top: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            border-radius: 8px;
            background-color: #fff;
        }

        label {
            display: block;
            margin-bottom: 10px;
            color: #008080;
            font-size: 18px;
            text-align: center;
        }

        input {
            padding: 12px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-bottom: 15px;
            width: 300px;
            box-sizing: border-box;
            text-align: center;
        }

        button {
            padding: 12px 24px;
            font-size: 16px;
            background-color: #008080;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #005757;
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
    <?php include 'header.php'; ?>

    <h1>Recherche d'événement par ID</h1>

    <!-- Formulaire de recherche par ID -->
    <form method="POST" action="">
        <label for="event_id">ID de l'événement :</label>
        <input type="text" id="event_id" name="event_id" required>
        <button type="submit">Rechercher</button>
    </form>

    <!-- Afficher un message d'erreur s'il y en a un -->
    <?php if (isset($error_message)): ?>
        <p style="color: #ff0000;"><?= htmlspecialchars($error_message); ?></p>
    <?php endif; ?>

    <!-- Afficher les détails de l'événement si disponibles -->
    <?php if (isset($evenementDetails)): ?>
        <h2>Détails de l'événement</h2>
        <p>Nom de l'événement: <?= htmlspecialchars($evenementDetails['nom_event']); ?></p>
        <?php if (isset($evenementDetails['adresse'])): ?>
            <p>Adresse: <?= htmlspecialchars($evenementDetails['adresse']); ?></p>
        <?php endif; ?>
        <!-- Ajouter d'autres détails de l'événement selon vos besoins -->
        <p>Nombre de participants: <?= $participantsCount; ?></p>

        <!-- Bouton pour accéder à la page de calcul du nombre de participants -->
        <a href="calculParticipants.php?id=<?= $event_id; ?>">Calculer le nombre de participants</a>
    <?php endif; ?>
    
    <?php include 'footer.php'; ?>
    <!-- Ajouter d'autres éléments de la page selon vos besoins -->
</body>
</html>
