<?php
include "../controller/instrumentsC.php";

$c = new insC();

// Vérifiez si le formulaire de recherche a été soumis
if (isset($_POST['search'])) {
    $searchTerm = $_POST['searchTerm'];
    $tab = $c->searchInstrumentsByName($searchTerm);
} elseif (isset($_POST['reset'])) {
    // Si le bouton "RESET" a été cliqué, affichez tous les instruments
    $tab = $c->listinstruments();
} else {
    // Si le formulaire n'a pas été soumis, affichez tous les instruments
    $tab = $c->listinstruments();
}

// Récupérez le meilleur instrument en fonction des likes
$bestInstrument = $c->getBestInstrument();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nos instruments</title>
    <!-- Ajoutez vos styles CSS ici -->
    <style>
        body {
            background-color: #f0f8ff;
        }

        .container {
            margin-top: 150px;
        }

        h1 {
            color: #4169e1 !important; /* Bleu royal */
            text-align: left;
        }

        h2 a {
            color: #4169e1;
        }

        .instrument {
            text-align: center;
            margin-bottom: 20px;
            display: inline-block;
            width: 30%; /* Ajustez la largeur selon vos besoins */
            vertical-align: top;
        }

        .instrument img {
            max-width: 100px;
            max-height: 100px;
        }

        /* Couleur rose pour les boutons */
        .like-btn,
        .dislike-btn {
            background-color: #ff1493; /* Rose */
            color: #ffffff;
            padding: 5px 10px;
            border: none;
            cursor: pointer;
        }
        .reset-link {
            font-size: 23px; /* Ajustez la taille du texte selon vos besoins */
            margin-left: 100px; /* Marge à gauche pour l'espace entre le bouton et le lien */
            text-decoration: none; /* Supprimez le soulignement du lien */
            color: #ff1493; /* Couleur rose */
        }

        /* Nouveau style pour le meilleur instrument */
        .best-instrument {
            text-align: center;
            margin-top: 30px;
            padding: 15px;
            border: 2px solid #ff1493;
            border-radius: 8px;
            width: 50%; /* Ajustez la largeur selon vos besoins */
            margin-left: auto;
            margin-right: auto;
        }

        .best-instrument img {
            max-width: 200px;
            max-height: 200px;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <?php include 'header.php'; ?>
    <div class="container">
        <h1>Nos instruments</h1>
        <form method="POST" action="">
            <label for="searchTerm">Rechercher par nom :</label>
            <input type="text" id="searchTerm" name="searchTerm" />
            <!-- Couleur rose pour le bouton "Rechercher" -->
            <input type="submit" name="search" value="Rechercher" style="background-color: #ff1493; color: #ffffff;" />

            <!-- Couleur rose pour le bouton "RESET" -->
            <input type="submit" name="reset" value="RESET" style="background-color: #ff1493; color: #ffffff;" />
            <a href="searchinstruments.php" class="reset-link">Appuyer pour rechercher par type</a>
        </form>
        <hr>
        <?php foreach ($tab as $joueur) { ?>
            <div class="instrument">
                <?php if (!empty($joueur['piece_jointe'])) : ?>
                    <img src="<?= $joueur['piece_jointe']; ?>" alt="Image" />
                <?php else : ?>
                    Aucune image
                <?php endif; ?>
                <p><?= $joueur['nom']; ?></p>

                <!-- Bouton Like -->
                <button class="like-btn" data-instrument-id="<?= $joueur['id_in']; ?>">Like</button>
                <span id="likes-count-<?= $joueur['id_in']; ?>"><?= $c->getLikesCount($joueur['id_in']); ?></span>

                <!-- Bouton Dislike -->
                <button class="dislike-btn" data-instrument-id="<?= $joueur['id_in']; ?>">Dislike</button>
                <span id="dislikes-count-<?= $joueur['id_in']; ?>"><?= $c->getDislikesCount($joueur['id_in']); ?></span>
            </div>
        <?php } ?>

        <!-- Affichage du meilleur instrument avec le nouveau style -->
        <?php if (!empty($bestInstrument)) : ?>
            <div class="best-instrument">
                <h2>Meilleur instrument:</h2>
                <?php if (!empty($bestInstrument['piece_jointe'])) : ?>
                    <img src="<?= $bestInstrument['piece_jointe']; ?>" alt="Image" />
                <?php else : ?>
                    Aucune image
                <?php endif; ?>
                <p><?= $bestInstrument['nom']; ?></p>
                <p>Likes: <?= $bestInstrument['likes']; ?></p>
            </div>
        <?php endif; ?>
    </div>
    <?php include 'footer.php'; ?>

    <!-- Ajout de jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function () {
            $('.like-btn').click(function () {
                var instrumentId = $(this).data('instrument-id');

                // Envoyez une requête AJAX pour incrémenter les likes
                $.ajax({
                    url: 'ajax_like.php',
                    method: 'POST',
                    data: { instrumentId: instrumentId },
                    success: function (response) {
                        // Mettez à jour le nombre de likes sur la page sans recharger la page
                        $('#likes-count-' + instrumentId).text(response);
                    }
                });
            });

            $('.dislike-btn').click(function () {
                var instrumentId = $(this).data('instrument-id');

                // Envoyez une requête AJAX pour incrémenter les dislikes
                $.ajax({
                    url: 'ajax_dislike.php',
                    method: 'POST',
                    data: { instrumentId: instrumentId },
                    success: function (response) {
                        // Mettez à jour le nombre de dislikes sur la page sans recharger la page
                        $('#dislikes-count-' + instrumentId).text(response);
                    }
                });
            });
        });
    </script>
</body>
</html>
