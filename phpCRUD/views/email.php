<?php
require '../config.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require __DIR__ . '/../vendor/autoload.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $dest_email = $_POST["dest_email"];
    $link_to_send = '';
    $avis = $_POST["avis"];

    // Envoi de l'e-mail avec l'avis
    $result = sendEmail($dest_email, $link_to_send, $avis);

    if ($result) {
        // Connexion à la base de données
        $pdo = config::getConnexion();

        // Insertion de l'avis dans la table 'avis'
        $insertStmt = $pdo->prepare("INSERT INTO avis (utilisateur, contenu) VALUES (?, ?)");
        $insertStmt->execute([$dest_email, $avis]);

        echo '<script>alert("Avis envoyé avec succès et enregistré dans la base de données.");</script>';
    }
}

function sendEmail($receiver_email, $link, $avis) {
    $smtp_server = 'smtp.gmail.com';
    $smtp_port = 587;
    $smtp_username = 'amenallah.kochrad@esprit.tn';
    $smtp_password = 'cqws onmc cgnj ycef';

    $mail = new PHPMailer(true);
    $mail->SMTPOptions = [
        'ssl' => [
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true,
        ],
    ];

    try {
        $mail->isSMTP();
        $mail->Host = $smtp_server;
        $mail->SMTPAuth = true;
        $mail->Username = $smtp_username;
        $mail->Password = $smtp_password;
        $mail->SMTPSecure = 'tls';
        $mail->Port = $smtp_port;

        $mail->setFrom($smtp_username, 'amenallah');
        $mail->addAddress($receiver_email);

        $mail->isHTML(false);
        $mail->Subject = 'Confirmation de réception de votre avis';
        $body = "Bonjour,\n\nNous avons bien reçu votre avis :\n\n$avis\n\nMerci de votre participation.\n\nCordialement.";
        $mail->Body = $body;

        $mail->send();
        return true;
    } catch (Exception $e) {
        echo 'Erreur lors de l\'envoi de l\'e-mail: ', $e->getMessage();
        return false;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Envoyer un e-mail</title>
    <style>
      
      body {
            font-family: Arial, sans-serif;
            background-color: #000; /* Set background color to black */
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        form {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 16px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #FF69B4; /* Set button color to pink */
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #FF1493; /* Change hover color to a darker shade of pink */
        }
    </style>
    </style>
</head>
<body>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <h2>Formulaire d'envoi d'e-mail</h2>
        <label for="dest_email">Adresse e-mail du destinataire :</label>
        <input type="email" id="dest_email" name="dest_email" required>
        <br>
        <label for="avis">Votre avis :</label>
        <textarea id="avis" name="avis" rows="4" cols="50"></textarea>
        <br>
        <input type="submit" value="Envoyer l'avis">
    </form>
</body>
</html>
