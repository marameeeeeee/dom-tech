<?php
include '../Controller/AvisC.php'; // Assurez-vous d'inclure le contrôleur pour les avis

$error = "";
$success = "";

$AvisC = new AvisC(); // Instanciez votre contrôleur AvisC ici

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (
        isset($_POST["commentaires"]) &&
        isset($_POST["note"])
    ) {
        // Créez une instance de la classe Avis avec les données du formulaire
        $avis = new Avis(
            $_POST["commentaires"],
            $_POST["note"]
        );

        // Ajoutez l'avis à la base de données
        $AvisC->addAvis($avis);

        $success = "Avis ajouté avec succès!";
    } else {
        $error = "Veuillez remplir tous les champs";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Avis</title>
    <style>
        body {
            background-color: #333; /* Fond gris foncé */
            color: #fff; /* Texte en blanc */
            font-family: Arial, sans-serif;
            padding: 20px;
        }

        button a {
            color: #fff; /* Lien en blanc */
            text-decoration: none;
            border: 1px solid #fff;
            padding: 5px 10px;
            border-radius: 5px;
            display: inline-block;
            margin-bottom: 20px;
        }

        hr {
            border: 0;
            height: 1px;
            background-color: #fff;
            margin-bottom: 20px;
        }

        #error {
            color: red;
            margin-bottom: 20px;
        }

        #success {
            color: green;
            margin-bottom: 20px;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
        }

        label {
            color: #a94442; /* Nom des champs en mauve sombre */
        }

        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            background-color: #fff; /* Champs à remplir en blanc */
            color: #333; /* Texte en gris foncé */
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
    <button><a href="listAvistypes.php">Retour à la liste des avis</a></button>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <div id="success">
        <?php echo $success; ?>
    </div>

    <form action="addAvistype.php" method="POST">
        <label for="commentaires">Commentaires :</label>
        <input type="text" id="commentaires" name="commentaires" required />
        <br>

        <label for="note">Note :</label>
        <input type="number" id="note" name="note" step="0.1" required />
        <br>

        <input type="submit" value="Ajouter Avis">
    </form>
</body>

</html>
