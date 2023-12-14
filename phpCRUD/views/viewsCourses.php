<?php
include '../Controller/CourstypeC.php';
include '../Controller/AvisC.php';

// Instanciation des contrôleurs
$courstypeC = new CourstypeC();
$avisC = new AvisC();

// Récupération de la liste complète des cours
$courstypes = $courstypeC->listCourstypes();

// Traitement du formulaire de commentaire
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['comment']) && isset($_POST['course_id'])) {
    $comment = $_POST['comment'];
    $courseId = $_POST['course_id'];

    // Vous devez également récupérer l'ID de l'utilisateur qui commente, par exemple, à partir de la session
    $userId = 1; // Remplacez ceci par la logique appropriée pour obtenir l'ID de l'utilisateur

    // Enregistrez le commentaire dans la table "avis"
    $avisC->addAvis($comment, $courseId, $userId);
}

// Récupération des commentaires pour chaque cours
$commentsPerCourse = $avisC->getCommentsPerCourse();
?>

<!DOCTYPE html>
<html lang="en">

<head>
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

        .container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            margin: 20px;
        }

        .course-card {
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 15px;
            margin: 10px;
            width: 300px;
            box-sizing: border-box;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .course-card h3 {
            margin-top: 0;
        }

        .image-column img {
            max-width: 100%;
            max-height: 150px;
            display: block;
            margin: 10px auto;
            border-radius: 5px;
        }

        .comment-form {
            margin-top: 15px;
        }

        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            padding: 10px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <header>
        <h1>Liste des Cours</h1>
    </header>

    <div class="container">
        <?php foreach ($courstypes as $courstype) : ?>
            <div class="course-card">
                <h3><?= $courstype['nom_de_cours']; ?></h3>
                <p>Type: <?= $courstype['type']; ?></p>
                <div class="image-column"><img src="<?= $courstype['imagePath']; ?>" alt="Image"></div>

                <!-- Afficher les commentaires pour le cours -->
                <h4>Commentaires :</h4>
                <?php if (isset($commentsPerCourse[$courstype['id']])) : ?>
                    <ul>
                        <?php foreach ($commentsPerCourse[$courstype['id']] as $comment) : ?>
                            <li><?= $comment['commentaires']; ?></li>
                        <?php endforeach; ?>
                    </ul>
                <?php else : ?>
                    <p>Aucun commentaire pour le moment.</p>
                <?php endif; ?>

                <!-- Ajout du formulaire de commentaire -->
                <div class="comment-form">
                    <form method="POST" action="viewCourses.php">
                        <textarea name="comment" placeholder="Ajouter un commentaire"></textarea>
                        <input type="hidden" name="course_id" value="<?= $courstype['id']; ?>">
                        <input type="submit" value="Ajouter un commentaire">
                    </form>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</body>

</html>