<?php
include '../Controller/CourstypeC.php';
include '../Controller/AvisC.php';
$courstypeC = new CourstypeC();

// Récupérer la liste des cours
$courstypes = $courstypeC->listCourstypes();

// Traitement du formulaire de notation et de commentaire
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['note'])) {
    $courseId = $_POST['course_id'];
    $note = $_POST['note'];
    $commentaire = $_POST['commentaire'];
    
    // Enregistrez la note et le commentaire dans votre base de données
    $courstypeC->saveRatingAndComment($courseId, $note, $commentaire);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des cours</title>
    <style>
        /* Ajout du style CSS */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #1f1f1f;
            color: #fff;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #333;
            color: #fff;
            padding: 10px;
            text-align: center;
        }

        .course-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            margin: 20px;
        }

        .course-card {
            width: 200px;
            margin: 10px;
            padding: 10px;
            border: 1px solid #444;
            border-radius: 8px;
            background-color: #2c2c2c;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            transition: transform 0.3s;
        }

        .course-card:hover {
            transform: scale(1.05);
        }

        .course-card img {
            max-width: 100%;
            height: auto;
            border-radius: 4px;
        }

        .course-card h3 {
            margin-bottom: 10px;
            font-size: 16px;
        }

        .rating-form {
            margin-top: 10px;
        }

        .rating-form input[type="number"] {
            width: 50px;
        }

        .rating-form textarea {
            width: 100%;
            margin-top: 10px;
        }

        .rating-form input[type="submit"],
        .rating-form textarea {
            margin-top: 10px;
        }

        .rating-form input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            padding: 8px 12px;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .rating-form input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <header>
        <h1>Liste des cours</h1>
    </header>

    <div class="course-container">
        <?php foreach ($courstypes as $courstype) : ?>
            <div class="course-card">
                <img src="<?= $courstype['imagePath']; ?>" alt="Image">
                <h3><?= $courstype['nom_de_cours']; ?></h3>
                <p>Type: <?= $courstype['type']; ?></p>
                
                <!-- Formulaire de notation et commentaire -->
                <form class="rating-form" method="POST" action="user_courses.php">
                    <label for="note">Note (/10):</label>
                    <input type="number" name="note" min="0" max="10" step="1" required>
                    
                    <label for="commentaire">Commentaire:</label>
                    <textarea name="commentaire" rows="4" required></textarea>
                    
                    <input type="hidden" name="course_id" value="<?= $courstype['id']; ?>">
                    <input type="submit" value="Noter">
                </form>
                <!-- Formulaire de notation et commentaire -->
<form class="rating-form" method="POST" action="user_courses.php">
    <!-- ... (votre code existant) ... -->

    <!-- Affichage des commentaires -->
    <div class="commentaires">
        <h4>Commentaires :</h4>
        <?php
        $commentaires = $courstypeC->getCommentaries($courstype['id']);
        foreach ($commentaires as $commentaire) :
        ?>
            <p><?= $commentaire['commentaries']; ?></p>
        <?php endforeach; ?>

        
    </div>
</form>

            </div>
        <?php endforeach; ?>
    </div>
</body>

</html>