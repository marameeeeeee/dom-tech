<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire de Participation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        header {
    background-color: #333;
    color: #fff;
    padding: 10px;
    text-align: center;
    margin-top: 100px;
}


        form {
            max-width: 400px;
            margin: 20px auto;
            padding: 20px;
            background: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
        }

        label,
        input[type="text"],
        input[type="email"],
        input[type="submit"] {
            display: block;
            margin-bottom: 15px;
        }

        input[type="text"],
        input[type="email"],
        input[type="submit"] {
            width: calc(100% - 30px);
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <?php include 'header.php'; ?>

    <form method="post" action="traitement_formulaire.php">
        <h2>Formulaire de Participation à un Événement</h2>
        <label for="nom">Nom:</label>
        <input type="text" id="nom" name="nom" required>

        <label for="prenom">Prénom:</label>
        <input type="text" id="prenom" name="prenom" required>

        <!-- Champ caché pour stocker le nom de l'événement -->
        <!-- Votre champ caché -->

        <label for="adresse_mail">Adresse e-mail:</label>
        <input type="email" id="adresse_mail" name="adresse_mail" required>

        <input type="submit" value="Participer">
    </form>
</body>
</html>
