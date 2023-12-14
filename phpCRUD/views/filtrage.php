<?php
require_once "../controller/RdvC.php"; // Assurez-vous que le chemin vers votre contrôleur est correct

$rdvC = new RdvC();
$statistics = $rdvC->getRdvStatistics();


// Traitement du formulaire de filtrage
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['filtrer'])) {
    $etatFiltre = $_POST['etatFiltre'];

    // Vérifier si un état est sélectionné
    if (!empty($etatFiltre)) {
        // Obtenez les rendez-vous filtrés par état
        $rdvsFiltres = $rdvC->getRdvsByEtat($etatFiltre);
    } else {
        // Si aucun état n'est sélectionné, affichez un message ou prenez une autre action
        echo '<script>alert("Veuillez sélectionner un état pour le filtrage.");</script>';
    }
}

// Obtenez tous les états pour le menu déroulant
$etats = $rdvC->getAllEtats();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Filtrage des Rendez-vous par État</title>
    <!-- Ajoutez les styles CSS nécessaires ici -->
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
body {
    font-family: Arial, sans-serif;
    background-color:whitesmoke; /* Changez cette ligne pour définir la couleur de fond en blanc */
    margin: 0;
    padding: 0;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    height: vh;
}
li.realise {
    color: green;
}

li.absent {
    color: red;
}

li.annule {
    color: white;
    background-color: gray; /* Ajoutez une couleur de fond grise pour l'état annulé */
}
form {
            border: 1px solid #ccc;
            padding: 20px;
            border-radius: 10px;
            width: 300px; /* Set the width of the form */
            margin: 0 auto; /* Center the form on the page */
        }

        ul {
            border: 1px solid #ccc;
            padding: 20px;
            border-radius: 10px;
            width: 300px; /* Set the width of the list */
            margin: 20px auto; /* Center the list on the page */
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
    <!-- Ajoutez votre en-tête ici -->

    <h1>Filtrage des Rendez-vous par État</h1>

    <!-- Formulaire de filtrage -->
    <form action="" method="POST">
        <label for="etatFiltre"></label>
        <select name="etatFiltre" id="etatFiltre">
            <!-- Option pour afficher tous les états -->
            <option value="">Tous les états</option>
            <?php
            // Afficher les options pour chaque état
            foreach ($etats as $etat) {
                echo '<option value="' . $etat . '">' . ucfirst($etat) . '</option>';
            }
            ?>
        </select>
        <input type="submit" value="Filtrer" name="filtrer">
    </form>

    <!-- Afficher les rendez-vous filtrés -->
    <!-- Afficher les rendez-vous filtrés -->
<?php if (isset($rdvsFiltres)) : ?>
    <h2>Rendez-vous filtrés :</h2>
    <ul>
        <?php foreach ($rdvsFiltres as $rdv) : ?>
            <li class="<?php echo strtolower($rdv['etat']); ?>">
                Rendez-vous le <?= $rdv['date'] ?> - <?= ucfirst($rdv['etat']) ?>
            </li>
        <?php endforeach; ?>
    </ul>
    <h2>Statistiques sur les Rendez-vous</h2>
<ul>
    <li>Total des rendez-vous :   <?= $statistics['total'] ?></li>
    <li>Rendez-vous réalisés :    <?= $statistics['realises'] ?></li>
    <li>Rendez-vous annulés :     <?= $statistics['annules'] ?></li>
    <li>Rendez-vous confirmés :   <?= $statistics['confirms'] ?></li>
    <li>Rendez-vous non confirmés :   <?= $statistics['nonConfirms'] ?></li>
    <li>Rendez-vous absents :   <?= $statistics['absents'] ?></li>
</ul>

<?php endif; ?>


    <!-- Ajoutez votre pied de page ici -->
  
    <a href="indexad.php" class="return-btn">Back to Profile</a>
    
</body>


</html>
