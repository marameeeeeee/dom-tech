


<?php include 'header.php'; ?>
    <?php require __DIR__ . '/../vendor/autoload.php'; ?>  



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Votre Avis</title>

    <style>
        
.container {
    text-align: center;
}

form {
    margin-top: 20px;
}

table {
    width: 100%;
}

td {
    padding: 10px;
}

label {
    font-weight: bold;
}

input[type="date"],
input[type="text"] {
    width: 100%;
    padding: 8px;
    box-sizing: border-box;
}

input[type="submit"],
input[type="reset"] {
    padding: 10px;
    background-color: #4caf50; /* Green */
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type="submit"]:hover,
input[type="reset"]:hover {
    background-color: #45a049;
}

a {
    text-decoration: none;
    color: #007bff;
}

a:hover {
    text-decoration: underline;
}

.error-message {
    color: red;
}
/* Ajouter cette règle pour changer la couleur du texte en rose */
label[for="date"], label[for="lieu"] {
    color: #ff69b4; /* Couleur rose */
}
/* Ajouter cette règle pour changer la couleur des boutons en blanc */
/* Ajouter cette règle pour changer le curseur au survol des boutons */
input[type="submit"]:hover,
input[type="reset"]:hover {
    background-color: #f0f0f0; /* Légère nuance de gris/blanc au survol */
    color: #000; /* Texte noir */
    cursor: pointer; /* Changer le curseur en une main pointer au survol */
}

/* Ajouter cette règle pour changer la couleur du lien en rose */
a {
    color: #ff69b4; /* Couleur rose */
}

/* Ajouter cette règle pour changer la couleur du lien en rose au survol */
a:hover {
    color: #ff1493; /* Couleur rose plus foncée au survol */
}
/* Ajouter cette règle pour créer un cadre autour de tout le champ */
.container {
    border: 1px solid #ccc; /* Bordure grise */
    padding: 20px; /* Espace intérieur */
    border-radius: 8px; /* Coins arrondis */
}

/* Ajouter cette règle pour styliser le lien "Back to List" comme un titre */
.container a {
    display: block; /* Rend le lien un bloc pour styliser le texte */
    font-size: 18px; /* Taille du texte */
    font-weight: bold; /* Texte en gras */
    color: #007bff; /* Couleur du texte bleu */
    text-decoration: none; /* Pas de soulignement sur le lien */
    margin-bottom: 10px; /* Marge en bas pour l'espace */
}
#quote {
    background-color: #d1ecf1; /* Nouvelle couleur de fond */
    color: #0c5460; /* Nouvelle couleur du texte */
    padding: 15px;
    border: 1px solid #bee5eb;
    border-radius: 4px;
    margin-bottom: 20px;
}

    </style>
</head>
<body>
    <div class="container mt-200">
        
        <hr>
        <div id="error"></div>
        <form action="" method="POST" onsubmit="return validateForm()">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <table>
                        <tr>
                            <td><label for="commentaire">Commentaire : </label></td>
                            <td>
                                <input
                                    type="text"
                                    id="commentaire"
                                    name="commentaire"
                                    placeholder="Ecrire le commentaire"
                                    required
                                />
                                <br>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="email">Email :</label></td>
                            <td>
                                <input
                                    type="text"
                                    id="email"
                                    name="email"
                                    placeholder="Entrez votre email"
                                    required
                                />
                                <br>
                                <span id="emailError" class="error-message"></span>
                            </td>
                        </tr>
                        <tr>
                            <td><br>
                                <input type="submit" name="submit" value="Confirmer">
                                <input type="reset" name="reset" value="Annuler">
                            </td>
                        </tr>
                    </table>

                    <div id="error">
                        <?php echo isset($error) ? $error : ''; ?>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <script src="assets/app/js/saisie.js"></script>

    <script>
        // Pré-remplir le champ commentaire avec la valeur de l'avis depuis l'URL
        var commentaireParam = new URLSearchParams(window.location.search).get('avis');
        if (commentaireParam) {
            document.getElementById("commentaire").value = commentaireParam;
        }

        function validateForm() {
            var commentaireValue = document.getElementById("commentaire").value;
            var emailValue = document.getElementById("email").value;

            // Validation de l'email
            if (!validateEmail(emailValue)) {
                document.getElementById("emailError").innerText = "Format d'email non valide";
                return false;
            } else {
                document.getElementById("emailError").innerText = "";
            }

            // ... Votre script de validation existant ...

            return true;
        }

        // Fonction de validation de l'e-mail
        function validateEmail(email) {
            var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return emailRegex.test(email);
        }
    </script>
</body>
</html>




<?php include 'footer.php'; ?>
<?php
include 'header.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $commentaire = $_POST['commentaire'];
    $email = $_POST['email'];
    $id_rv = isset($_GET['id_rv']) ? $_GET['id_rv'] : '';

    // Validation de l'email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo '<script>alert("Format d\'email non valide")</script>';
    } else {
        try {
            $bdd = new PDO('mysql:host=localhost;dbname=conservatoire', 'root', '');
            $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Insérez le feedback dans la table feedback avec l'ID du rendez-vous
            $sql = "INSERT INTO feedback (commentaire, email, id_rv) VALUES (:commentaire, :email, :id_rv)";
            $stmt = $bdd->prepare($sql);
            $stmt->bindValue(':commentaire', $commentaire, PDO::PARAM_STR);
            $stmt->bindValue(':email', $email, PDO::PARAM_STR);
            $stmt->bindValue(':id_rv', $id_rv, PDO::PARAM_INT);
            $result = $stmt->execute();

            if ($result) {
                echo '<script>alert("Insertion terminée")</script>';
                echo '<a href="listFeeds.php">Voir la liste des avis</a>';
                
                // Configuration et envoi de l'e-mail
                $mail = new PHPMailer(true);
                
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'amenallah.kochrad@esprit.tn';
                $mail->Password = 'vzcn lnak wrny rgnfs';
                $mail->SMTPSecure = 'tls';
                $mail->Port = 587;

                $mail->setFrom('amenallah.kochrad@esprit.tn', 'amenallah');
                $mail->addAddress($email);

                $mail->isHTML(false);
                $mail->Subject = 'Confirmation de rendez-vous';
                $mail->Body = "Votre rendez-vous a été confirmé.";

                $mail->send();
                echo "<script>alert('E-mail envoyé avec succès pour la confirmation du rendez-vous.');</script>";
            } else {
                echo '<script>alert("Insertion échouée")</script>';
            }
        } catch (PDOException $e) {
            echo '<script>alert("Erreur de base de données: ' . $e->getMessage() . '")</script>';
        } catch (Exception $e) {
            echo "<script>alert('Erreur lors de l'envoi de l'e-mail : {$mail->ErrorInfo}');</script>";
        }
    }
}

include 'footer.php';
?>






