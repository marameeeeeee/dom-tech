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
    $smtp_username = 'mohamedbadiss.boumiza@esprit'; // Remplacez par votre adresse e-mail complète
    $smtp_password = 'cqlt cthr niad frua'; // Remplacez par votre mot de passe

    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host = $smtp_server;
        $mail->SMTPAuth = true;
        $mail->Username = $smtp_username;
        $mail->Password = $smtp_password;
        $mail->SMTPSecure = 'tls';
        $mail->Port = $smtp_port;

        $mail->setFrom($smtp_username, 'Mohamed Badiss Boumiza');
        $mail->addAddress($receiver_email);

        $mail->isHTML(false);
        $mail->Subject = 'Rappel :priere de proceder au paiment ';
        $body = "Bonjour,\n\n cher client veuiller payer votre abonnement";
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
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        h2 {
            color: #333;
        }
        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            margin: 0 auto;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="email"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border-radius: 3px;
            border: 1px solid #ccc;
        }
        input[type="submit"] {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h2>Formulaire d'envoi d'e-mail</h2>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="dest_email">Adresse e-mail du destinataire:</label>
        <input type="email" id="dest_email" name="dest_email" required>
        <br>
        <input type="submit" value="Envoyer l'e-mail">
    </form>
</body>
</html>
