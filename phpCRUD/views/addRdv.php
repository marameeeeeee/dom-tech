<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Rendez-vous</title>
    <link rel="stylesheet" href="path/to/your/css/style.css"> <!-- Add your custom CSS file -->
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
            
        }

        .container {
            margin-top: 150px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #333;
            color: white;
        }

        label {
            font-weight: bold;
        }

        input[type="date"],
        select {
            width: 100%;
            padding: 8px;
            margin: 5px 0 15px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        input[type="submit"],
        input[type="reset"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover,
        input[type="reset"]:hover {
            background-color: #45a049;
        }

        #error {
            color: red;
            margin-bottom: 10px;
        }

        #quote {
            margin-top: 20px;
            font-style: italic;
            color: #555;
        }
        .container {
    text-align: center; /* Centrer le contenu à l'intérieur de la div container */
}
        .calendrier-button {
    display: inline-block;
    padding: 5px 5px; /* Ajustez la taille du bouton selon vos préférences */
    background-color: red;
    color: black; /* Couleur du texte */
    text-decoration: none;
    font-size: 16px; /* Ajustez la taille de la police selon vos préférences */
    border: 2px solid black; /* Ajoutez une bordure si nécessaire */
    border-radius: 5px; /* Ajoutez une bordure arrondie si nécessaire */
}

.calendrier-button:hover {
    background-color: #f0f0f0; /* Couleur de fond lorsqu'on survole le bouton */
    color: pink; /* Couleur du texte lorsqu'on survole le bouton */
}

    </style>
</head>

<body>
<?php include 'header.php'; ?>
    <div class="container">
        <form action="" method="POST" onsubmit="return validateForm()">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <table>
                        <tr>
                            <td><label for="date">Choisir une date :</label></td>
                            <td>
                                <input type="date" id="id_rv" name="date" required />
                            </td>
                        </tr>
                        <tr>
                            <td><label for="lieu">Choisir le lieu :</label></td>
                            <td>
                                <select id="lieu" name="lieu" required>
                                    <option value=""></option>
                                    <option value="presentiel">Présentiel</option>
                                    <option value="enligne">En ligne</option>
                                </select>
                            </td>
                            <a href="calendrier.html" target="_blank" class="calendrier-button">Voir le Calendrier</a>
                        </tr>
                        <tr>
                            <td><label for="etat">État du rendez-vous :</label></td>
                            <td>
                                <select id="etat" name="etat" required>
                                    <option value=""></option>
                                    <option value="réalisé">réalisé</option>
                                    <option value="absent">absent</option>
                                    <option value="annulé">annulé</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <input type="submit" name="submit" value="Save">
                                <input type="reset" name="reset" value="Reset">
                            </td>
                        </tr>
                    </table>
                    <div class="add-feed-button">
        <a href="email.php">Ajouter votre avis</a>
                    </div>
                    <div id="error">
                        <?php echo isset($error) ? $error : ''; ?>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="container mt-20">
        
        <hr>
        <div id="quote">
            <p>"Le choix est le crayon qui dessine les contours de notre destin. Choisir, c'est tracer le chemin sur lequel nos actions prennent vie, sculptant ainsi l'œuvre unique de notre existence."</p>
        </div>
    </div>

    <script>
        function validateForm() {
            var dateRdvValue = new Date(document.getElementById("id_rv").value);
            var minDate = new Date("2024-01-01");
            var maxDate = new Date("2024-12-31");

            if (dateRdvValue < minDate || dateRdvValue > maxDate) {
                alert("Invalid date: la date doit être comprise entre '2024-01-01' et '2024-12-31'");
                return false;
            } else {
                var lieuValue = document.getElementById("lieu").value;
                if (lieuValue.trim() === "" || !["presentiel", "enligne"].includes(lieuValue.trim().toLowerCase())) {
                    alert("Lieu non valide");
                    return false;
                } else {
                    alert("Date et lieu valides");
                    return true;
                }
            }
        }
    </script>
</body>

</html>



<?php


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $lieu = $_POST['lieu'];
    $date = $_POST['date'];
    $etat = $_POST['etat'];

    if (empty($lieu) || !in_array(strtolower($lieu), ['presentiel', 'enligne'])) {
        echo '<script>alert("Lieu non valide")</script>';
    } else if (empty($etat) || !in_array(strtolower($etat), ['réalisé', 'absent', 'annulé'])) {
        echo '<script>alert("État non valide")</script>';
    } else {
        try {
            $bdd = new PDO('mysql:host=localhost;dbname=conservatoire', 'root', '');
            $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
            // Insérez le rendez-vous dans la table rdv
            $sql = "INSERT INTO rdv (lieu, date, etat) VALUES (:lieu, :date, :etat)";
            $stmt = $bdd->prepare($sql);
            $stmt->bindValue(':lieu', $lieu, PDO::PARAM_STR);
            $stmt->bindValue(':date', $date, PDO::PARAM_STR);
            
            // Assurez-vous que l'état est correctement ajusté à la valeur attendue
            $etatValeur = strtolower($etat) === 'réalisé' ? 'réalisé' : (strtolower($etat) === 'annulé' ? 'annulé' : 'absent');

            $stmt->bindValue(':etat', $etatValeur, PDO::PARAM_STR);
            
            $result = $stmt->execute();
    
            // ...
        } catch (PDOException $e) {
            echo '<script>alert("Erreur de base de données: ' . $e->getMessage() . '")</script>';
        }
    }
}
include 'footer.php';
?>
