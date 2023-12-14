<?php
include '../Controller/CourstypeC.php';

$courstypeC = new CourstypeC();
$comments = $courstypeC->getAllComments();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Commentaires</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>

    <div class="container mt-5">
        <h2>Liste des Commentaires</h2>

        <div class="row">
            <!-- Afficher les commentaires -->
            <?php foreach ($comments as $comment) : ?>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <p class="card-text"><?= $comment['content']; ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

    </div>

</body>

</html>
