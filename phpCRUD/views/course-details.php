<!-- course-details.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails du Cours</title>
</head>
<body>
    <?php
    // Vérifier si l'ID du cours est présent dans l'URL
    if (isset($_GET['id'])) {
        $courseId = $_GET['id'];
        // Récupérer les détails du cours à partir de la base de données
        $courseDetails = $CourstypeC->showcourstype($courseId);

        // Afficher les détails du cours
        echo '<h1>' . $courseDetails['nom_de_cours'] . '</h1>';
        echo '<p>Type: ' . $courseDetails['type'] . '</p>';
        echo '<img src="' . $courseDetails['imagePath'] . '" alt="Image du Cours">';
        // Ajouter d'autres détails du cours ici

        // Afficher les commentaires et la note ici
        $comments = $CourstypeC->getCommentsForCourse($courseId);
        echo '<h2>Commentaires</h2>';
        foreach ($comments as $comment) {
            echo '<p>' . $comment['commentaries'] . '</p>';
        }
    } else {
        // Rediriger si l'ID du cours n'est pas présent
        header('Location: index.php');
        exit();
    }
    ?>
</body>
</html>
