<?php
include '../Controller/CourstypeC.php';
$courstypeC = new CourstypeC();

// Effectuer la recherche si le formulaire est soumis
$searchResults = [];
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['search'])) {
    $searchTerm = $_GET['search'];
    $searchResults = $courstypeC->searchByNomDeCours($searchTerm);
}

// Récupérer la liste complète des cours si la recherche n'est pas effectuée
if (empty($searchResults)) {
    $courstypes = $courstypeC->listCourstypes();
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

        form {
            margin-top: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        form {
            display: inline-block;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            padding: 5px 10px;
            border: none;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        /* Ajout de styles pour la colonne de l'image */
        .image-column {
            text-align: center;
        }

        .image-column img {
            max-width: 100px;
            max-height: 100px;
            display: block;
            margin: 0 auto;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        .image-column p {
            margin: 0;
        }

        .rating {
            unicode-bidi: bidi-override;
            direction: rtl;
            text-align: center;
            position: relative;
        }

        .rating > span {
            display: inline-block;
            position: relative;
            width: 1.1em;
            font-size: 24px;
            color: #ccc;
            cursor: pointer;
        }

        .rating > span:hover:before,
        .rating > span:hover ~ span:before {
            content: '\2605';
            position: absolute;
            color: #ffcc00;
        }

        /* Nouveau style pour les boutons */
        button {
            background-color: #28a745;
            color: #fff;
            padding: 5px 10px;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: #218838;
        }
        .return-btn {
            display: inline-block;
            padding: 8px 16px;
            background-color: #333;
            color: #fff;
            text-decoration: none;
            border: none;
            border-radius: 4px;
        }

        .return-btn:hover {
            background-color: #555;
        }
    </style>
</head>

<body>
    <header>
        <!-- Ajout du formulaire de recherche en haut à gauche -->
        <form action="listCourstypes.php" method="GET">
            <input type="text" name="search" placeholder="Rechercher un cours">
            <input type="submit" value="Search">
        </form>

        <h1>Liste des cours</h1>
        <h2><a href="addCourstype.php">Ajouter un cours</a></h2>
    </header>

    <div class="container mt-200">
        <center>
            <!-- Afficher les résultats de la recherche, s'il y en a -->
            <?php if (!empty($searchResults)) : ?>
                <h3>Résultats de la recherche :</h3>
                <table border="1" align="center" width="70%">
                    <tr>
                        <th>Nom de cours</th>
                        <th>Image</th>
                    </tr>
                    <?php foreach ($searchResults as $result) : ?>
                        <tr>
                            <td><?= $result['nom_de_cours']; ?></td>
                            <td class="image-column">
                                <?php if (!empty($result['image_path'])) : ?>
                                    <img src="<?= $result['image_path']; ?>" alt="Cours Image">
                                <?php else : ?>
                                    No Image
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            <?php endif; ?>

            <h3>Liste complète des cours :</h3>
            <table border="1" align="center" width="70%">
                <tr>
                    <th>Id cours</th>
                    <th>Nom_de_cours</th>
                    <th>Type</th>
                    <th>Image</th>
                    <th>Update</th>
                    <th>Delete</th>
                </tr>

                <?php if (!empty($courstypes)) : ?>
                    <?php foreach ($courstypes as $courstype) : ?>
                        <tr>
                            <td><?= $courstype['id']; ?></td>
                            <td><?= $courstype['nom_de_cours']; ?></td>
                            <td><?= $courstype['type']; ?></td>
                            <td class="image-column">
                                <?php if (!empty($courstype['nom_de_cours'])) : ?>
                                    <img src="<?= $courstype['image_path']; ?>" alt="Cours Image">
                                <?php else : ?>
                                    No Image
                                <?php endif; ?>
                            </td>
                            <td align="center">
                                <form method="POST" action="updateCourstype.php">
                                    <input type="hidden" name="id" value="<?= $courstype['id']; ?>">
                                    <button type="submit" name="update">Update</button>
                                </form>
                            </td>
                            <td>
                                <form method="POST" action="deleteCourstyper.php" onsubmit="return confirm('Are you sure you want to delete this course?');">
                                    <input type="hidden" name="id" value="<?= $courstype['id']; ?>">
                                    <button type="submit" name="delete">Delete</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </table>
        </center>
    </div>

    
    <a href="indexad.php" class="return-btn">Back to Profile</a>
    <?php include 'footer.php'; ?>
</body>

</html>