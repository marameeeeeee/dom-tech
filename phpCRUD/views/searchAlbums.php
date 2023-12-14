<?php
require_once "../controller/EvenementTC.php";
$evenementC = new event_typeC();

// Traitement du formulaire
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['type_event']) && isset($_POST['search'])) {
        $type_event = $_POST['type_event'];
        $list = $evenementC->afficheevents($type_event);
    }
}

$fedy = $evenementC->afficheEvenementtypes();
?>

<!DOCTYPE html>
<head>
    <title>Recherche evenement</title>
    <style>
        /* Ajout du style CSS */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
            color: #333; /* Couleur principale du texte */
        }

        header {
            background-color: #333;
            color: #fff;
            padding: 10px;
            text-align: center;
            margin-top: 120px;
        }

        form {
            margin-top: 20px;
            text-align: center;
        }

        label {
            margin-right: 10px;
        }

        select {
            padding: 5px;
        }

        input[type="submit"] {
            padding: 8px 15px;
            background-color: #008080; /* Nouvelle couleur du bouton */
            color: #fff;
            border: none;
            cursor: pointer;
        }

        h1,
        h2 {
            color: #008080; /* Nouvelle couleur pour les titres */
            font-size: 2em;
            font-weight: bold;
            text-transform: uppercase;
            border-bottom: 2px solid #008080;
            padding-bottom: 10px;
            margin-bottom: 20px;
            letter-spacing: 2px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
            background: linear-gradient(to right, #000, #111);
            display: inline-block;
            border-radius: 10px;
            padding: 15px 20px;
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        li {
            margin-bottom: 15px;
            text-align: center; /* Ajustez l'alignement du texte selon vos préférences */
        }

        .event-image {
            max-width: 150px; /* Nouvelle taille maximale de l'image en largeur */
            max-height: 150px; /* Nouvelle taille maximale de l'image en hauteur */
            margin-bottom: 10px; /* Espacement entre l'image et le texte */
        }

        .event-item p {
            color: #007BFF; /* Nouvelle couleur du texte du nom */
            font-weight: bold; /* Mise en évidence du texte */
            margin-bottom: 5px; /* Espacement entre le texte et l'image */
        }
        label[for="type_event"] {
    color: #008080; /* Nouvelle couleur pour "Sélectionner un type" (vert canard) */
    /* Autres styles pour le label si nécessaire */
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
    </style>
</head>

<body>

    <?php include 'header.php'; ?>
    <h1>Recherche evenement à travers son type</h1>
    <form action="" method="POST">
        <label for="type_event">Sélectionner un type :</label>
        <select name="type_event" id="type_event">
            <?php
            foreach ($fedy as $tx) {
                echo '<option value="' . $tx['type_event'] . '">' . $tx['type_event'] . '</option>';
            }
            ?>
        </select>
        <input type="submit" value="Rechercher" name="search">
    </form>
    <?php if (isset($list)) { ?>

        <br>
        <h2>Evenements correspondants au type sélectionné :</h2>
        <ul>
            <?php foreach ($list as $ss) { ?>
                <li>
                    <?= $ss['nom'] ?>
                    <?php if (!empty($ss['image_path'])) { ?>
                        <img src="<?= $ss['image_path'] ?>" alt="Event Image" class="event-image">
                    <?php } ?>
                </li>
            <?php } ?>
        </ul>
        <a href="http://localhost/eventt/evenementttt/views/formulaire_paticipation.php?nom_event=<?= urlencode($evenement['nom_event']); ?>">S'inscrire</a>
    <?php } ?>
    <?php include 'footer.php'; ?>
</body>
</html>
