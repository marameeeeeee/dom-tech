<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $dest_email = $_POST["dest_email"];
    $link_to_send = '';
    sendEmail($dest_email, $link_to_send);
}

function sendEmail($receiver_email, $link) {
    $smtp_server = 'smtp.gmail.com'; // Remplacez par l'adresse du serveur SMTP de votre domaine
    $smtp_port = 587; // Le port peut varier, assurez-vous d'utiliser le port correct pour votre serveur SMTP
    $smtp_username = 'maram.omezzine@esprit.tn'; // Remplacez par votre adresse e-mail complète
    $smtp_password = 'decx pjkg dxnd vnce'; // Remplacez par votre mot de passe

    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host = $smtp_server;
        $mail->SMTPAuth = true;
        $mail->Username = $smtp_username;
        $mail->Password = $smtp_password;
        $mail->SMTPSecure = 'tls';
        $mail->Port = $smtp_port;

        $mail->setFrom($smtp_username, 'omezzine Maram');
        $mail->addAddress($receiver_email);

        $mail->isHTML(false);
        $mail->Subject = 'Lien de confirmation';
        $body = "Bonjour,\n\n Confirmation de la participation à l'événement fête de fin d'année,\n\n Date : 31/11/2023,\n\n Adresse : DOM-TECH conservatoire (Ariana),\n\n Bienvenue : $link\n\nSoyez à l'heure à l'événement.\n\nCordialement.";
        $mail->Body = $body;

        $mail->send();
        echo 'E-mail envoyé avec succès.';
    } catch (Exception $e) {
        echo 'Erreur lors de l\'envoi de l\'e-mail: ', $e->getMessage();
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
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f7f7f7;
            color: #333;
            margin: 0;
            padding: 20px;
            text-align: center;
        }

        h2 {
            color: #008080;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 20px;
        }

        label {
            margin-bottom: 10px;
            font-weight: bold;
        }

        input {
            padding: 8px;
            margin-bottom: 20px;
            width: 100%;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #008080;
            color: #fff;
            cursor: pointer;
        }
    </style>
</head>
<body>

    <h2>Formulaire d'envoi d'e-mail</h2>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="dest_email">Adresse e-mail du destinataire :</label>
        <input type="email" id="dest_email" name="dest_email" required>
        <br>
        <input type="submit" value="Envoyer l'e-mail">
    </form>
</body>
</html>