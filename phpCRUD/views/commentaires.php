<?php
// commentaires.php
session_start();
include '../Controller/CourstypeC.php';
$courstypeC = new CourstypeC();

// Récupérer les commentaires de l'utilisateur (par exemple, en utilisant une session)
$userId = $_SESSION['id_cours']; // Assurez-vous d'adapter cela à votre système d'authentification
$commentaires = $courstypeC->getCommentairesByUserId($userId);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Commentaires de l'utilisateur</title>
    <style>
        /* Ajoutez votre style CSS ici */
    </style>
</head>

<body>
    <h1>Commentaires de l'utilisateur</h1>

    <?php if (!empty($commentaires)) : ?>
        <ul>
            <?php foreach ($commentaires as $commentaire) : ?>
                <li><?= $commentaire['commentaries']; ?></li>
            <?php endforeach; ?>
        </ul>
    <?php else : ?>
        <p>Aucun commentaire disponible.</p>
    <?php endif; ?>
</body>

</html>
