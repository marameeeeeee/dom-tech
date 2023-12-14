<?php
include '../Controller/CourstypeC.php';
include '../model/Courstype.php';

$error = "";
$successMessage = "";

// Créer une instance du contrôleur
$CourstypeC = new CourstypeC();

// Instance du cours à mettre à jour
$courstype = null;

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérifier si les champs requis sont renseignés
    if (
        isset($_POST['nom_de_cours']) &&
        isset($_POST['type'])
    ) {
        // Forcer la valeur "professeur" pour le champ "type"
        $_POST["type"] = "professeur";

        // Traitement de l'image
        

        // Créer une instance de la classe Courstype avec les données du formulaire
        $courstype = new Courstype(
            $_POST['id'],
            $_POST['nom_de_cours'],
            $_POST['type']
            
        );

        // Mettre à jour le cours dans la base de données
        $CourstypeC->updateCourstype($courstype, $_POST['id']);
        

        // Message de succès
        $successMessage = "Cours mis à jour avec succès!";
    } else {
        // Message d'erreur si des informations sont manquantes
        $error = "Veuillez remplir tous les champs obligatoires.";
    }
}

// Récupérer les données du cours à partir de la base de données
if (isset($_POST['id'])) {
    $courstype = $CourstypeC->showcourstype($_POST['id']);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Courstype</title>
    <style>
        /* Ajouter du style CSS ici */
        body {
            background-color: #333;
            color: #fff;
            font-family: Arial, sans-serif;
            padding: 20px;
        }

        button a {
            color: #fff;
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
            color: #a94442;
        }

        input[type="text"],
        input[type="file"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            background-color: #fff;
            color: #333;
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
    <button><a href="listCourstypes.php">Retour à la liste</a></button>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <div id="success">
        <?php echo $successMessage; ?>
    </div>

    <?php
    if ($courstype) :
    ?>
        <form action="updateCourstype.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $courstype['id']; ?>">
            <label for="nom_de_cours">Nom :</label>
            <input type="text" id="nom_de_cours" name="nom_de_cours" value="<?= $courstype['nom_de_cours']; ?>" required />
            <br>

            <label for="type">Type :</label>
            <input type="text" id="type" name="type" value="<?= $courstype['type']; ?>" required />
            <br>

            
            <br>

            <input type="submit" value="Enregistrer">
        </form>
        
    <?php
    endif;
    ?>

</body>

</html>