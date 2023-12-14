<?php
include '../Controller/CourstypeC.php';

$courstypeC = new CourstypeC();
$courstypes = $courstypeC->listCourstypes();

// Supposons que vous ayez une fonction pour obtenir l'ID de l'utilisateur actuel
// Remplacez ceci par la manière dont vous obtenez l'ID de l'utilisateur dans votre application
$userId = 1;
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Cours</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Ajouter des styles pour les cartes 3D */
        .course-card {
            margin-bottom: 20px;
            margin-top: 100px;
        }

        .card .card-body {
            backface-visibility: hidden;
        }

        /* Ajouter des styles pour les commentaires et les notes */
        .comments-section,
        .rating-section {
            margin-top: 20px;
        }
        .container {
            margin-top: 300px;
        }
        .comment-form,
        .rating-form {
            margin-top: 20px;
        }
    </style>
    <script>
        function deleteComment(commentId) {
            // Envoyer une requête AJAX pour supprimer le commentaire
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "deletecommentaire.php", true);
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    // Actualiser la section des commentaires après la suppression
                    // Vous pouvez également cacher le commentaire directement côté client
                    window.location.reload();
                }
            };
            xhr.send("comment_id=" + commentId);
        }
    </script>
</head>
<body>
    <?php include 'header.php'; ?>
    <div class="container mt-5">
        <h2>Liste des Cours</h2>

        <div class="row">
            <!-- Afficher les cours sous forme de cartes -->
            <?php foreach ($courstypes as $courstype) : ?>
                <div class="col-md-4">
                    <div class="course-card">
                        <div class="card">
                            <?php
                            $imagePath = $courstype['image_path']; // Récupération du chemin relatif de l'image
                            $imageUrl = ''; // Initialisation de l'URL de l'image

                            if (!empty($imagePath)) {
                                // Construction de l'URL complète de l'image
                                $imageUrl =$imagePath;
                                // Assurez-vous de remplacer 'https://votre-domaine.com/chemin/vers/images/' par le chemin réel vers vos images
                            }
                            ?>
                            <img src="<?= $imageUrl; ?>" class="card-img-top" alt="Image du cours">
                            <div class="card-body">
                            <h5 class="card-title"><?= $courstype['nom_de_cours']; ?></h5>
                                <p class="card-text">Type: <?= $courstype['type']; ?></p>

                                <!-- Ajouter une section de commentaires -->
                                <div class="comments-section">
                                    <h6>Commentaires :</h6>
                                    <?php
                                    // Récupérer les commentaires du cours
                                    $comments = $courstypeC->getComments($courstype['id']);
                                    foreach ($comments as $comment) :
                                        ?>
                                            <p>
                                                <?= $comment['content']; ?>
                                                <button class="btn btn-danger btn-sm" onclick="deleteComment(<?= $comment['id']; ?>)">Supprimer</button>
                                            </p>
                                        <?php endforeach; ?>
                                </div>

                                <!-- Ajouter un formulaire pour ajouter un commentaire -->
                                <form action="addcommentaire.php" method="POST" class="comment-form">
                                    <input type="hidden" name="course_id" value="<?= $courstype['id']; ?>">
                                    <div class="form-group">
                                        <label for="comment_content">Ajouter un commentaire :</label>
                                        <textarea class="form-control" id="comment_content" name="comment_content" rows="3" required></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Ajouter un commentaire</button>
                                </form>

                                <!-- Ajouter une section de notation -->
                                <div class="rating-section">
                                    <h6>Noter le cours :</h6>
                                    <form action="addrating.php" method="POST" class="rating-form">
                                        <input type="hidden" name="course_id" value="<?= $courstype['id']; ?>">
                                        <div class="form-group">
                                            <label for="rating_value">Choisir une note :</label>
                                            <select class="form-control" id="rating_value" name="rating_value" required>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Attribuer une note</button>
                                    </form>
                                </div>

                                <!-- Afficher la note attribuée par l'utilisateur actuel -->
                                <?php
                                if (isset($userId)) {
                                    $userRating = $courstypeC->getUserRating($courstype['id'], $userId);
                                    if ($userRating !== false && is_array($userRating)) {
                                        echo "<p>Votre note: " . $userRating['rating'] . "</p>";
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <?php include 'footer.php';?>
</body>
</html>