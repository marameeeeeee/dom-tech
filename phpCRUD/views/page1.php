<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ma Page d'Accueil PHP</title>
    <style>
        body {
            background-color: black;
            color: white; /* Pour changer la couleur du texte en blanc */
            margin: 0; /* Pour supprimer la marge par défaut du corps */
            padding: 20px; /* Ajoute un peu d'espacement autour du contenu */
            font-family: Arial, sans-serif; /* Pour changer la police du texte */
        }

        h1 {
            color: yellow; /* Vous pouvez changer la couleur du titre */
        }
    </style>
</head>
<body>
    <h1>Bienvenue sur ma page d'accueil en PHP !</h1>

    <?php
    // Exemple d'utilisation de PHP pour afficher la date actuelle
    echo "<p>La date d'aujourd'hui est " . date("d/m/Y") . ".</p>";
    ?>
</body>
</html>
