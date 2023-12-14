<?php
include '../Controller/CourstypeC.php';
$courstypeC = new CourstypeC();

// Récupérer la liste des cours ajoutés par l'admin
$courstypes = $courstypeC->getCoursesForUser();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de bord de l'utilisateur</title>
    <style>
        /* Ajoutez ici votre style CSS personnalisé */
    </style>
</head>

<body>
    <header>
        <h1>Tableau de bord de l'utilisateur</h1>
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
                    
        
                    
                    <input type="hidden" name="course_id" value="<?= $courstype['id']; ?>">
                    <input type="submit" value="Noter">
                </form>

              
            </div>
        <?php endforeach; ?>
    </div>
</body>

</html>
