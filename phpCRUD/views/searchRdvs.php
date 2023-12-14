
<?php
require_once "../controller/feedbackC.php";

$feedC = new feedC();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['genre']) && isset($_POST['search'])) {
        $id_rv = $_POST['genre'];
        $commentsAndEmails = $feedC->getCommentsAndEmailsByDate($id_rv);
    }
}
$amen = $feedC->afficheRdvs();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Page de recherche </title>
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

form {
    margin-top: 20px;
}

label {
    display: block;
    margin-bottom: 10px;
    font-size: 16px;
}

/* Style des champs de sélection de date */
input[type="date"] {
    padding: 10px;
    box-sizing: border-box;
    border-radius: 50%; /* Utilisez 50% pour rendre le champ circulaire */
    font-size: 16px;
    margin-bottom: 15px;
}

select {
    padding: 10px;
    box-sizing: border-box;
    border-radius: 50%; /* Utilisez 50% pour rendre le champ circulaire */
    font-size: 16px;
    margin-bottom: 15px;
}

/* Style des boutons */
input[type="submit"], button {
    background-color: #FF69B4; /* Rose */
    color: white;
    cursor: pointer;
    padding: 10px;
    border: none;
    border-radius: 50%; /* Utilisez 50% pour rendre le bouton circulaire */
    font-size: 16px;
    margin-right: 10px; /* Ajoutez un peu de marge entre les boutons */
}

/* Changement de couleur au survol */
input[type="submit"]:hover, button:hover {
    background-color: #FF1493; /* Rose plus foncé au survol */
}

ul {
    list-style-type: none;
    padding: 0;
}

li {
    margin-bottom: 10px;
}

footer {
    background-color: #333;
    color: #fff;
    padding: 10px;
    text-align: center;
    position: fixed;
    bottom: 0;
    width: 100%;
}
/* Ajoutez ces styles à votre feuille de style CSS */

.btn-link {
    display: inline-block;
    padding: 5px 5px;
    background-color: #FFFFFF; /* Blanc */
    color: #000; /* Texte noir */
    text-decoration: none;
    border-radius: 5px; /* Forme circulaire */
    border: 2px solid #FFFFFF; /* Bordure blanche */
}

.btn-link:hover {
    background-color: #CCCCCC; /* Gris plus foncé au survol */
    border: 2px solid #CCCCCC; /* Bordure grise plus foncée au survol */
}



    </style>
</head>

<body>
    <?php include 'header.php'; ?>
    <div class="text-center"> <!-- Ajout de la classe text-center -->
        <h1>Pages des recherches </h1>
        <form action="" method="POST">
            <label for="id_rv"></label>
            <select name="genre" id="genre">
                <!-- Ajout de l'option "Dates" -->
                <option value="dates">Dates</option>
                <?php
                foreach ($amen as $tx) {
                    echo '<option value="' . $tx['id_rv'] . '">' . $tx['date'] . '</option>';
                }
                ?>
            </select>
            <input type="submit" value="Rechercher" name="search">
            
        </form>

        <?php if (isset($commentsAndEmails)) { ?>
            <br>
            <h2 style="font-size: 18px;">les cordonneés  correspondants au rendez-vous sélectionné :</h2>
            <ul>
                <?php foreach ($commentsAndEmails as $commentAndEmail) { ?>
                    <li>
                        Commentaire : <?= $commentAndEmail['commentaire'] ?>,
                    </li>
                    <li>
                        Email : <?= $commentAndEmail['email'] ?>
                    </li>
                <?php } ?>
            </ul>
        <?php } ?>

    

    </div>
    <p><a href="filtrage.php" class="btn-link">Aller à la page de filtrage</a></p>

    <?php include 'footer.php'; ?>
</body>

</html>
