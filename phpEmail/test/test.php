<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'path/to/PHPMailer/src/Exception.php';
require 'path/to/PHPMailer/src/PHPMailer.php';
require 'path/to/PHPMailer/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $dest_email = $_POST["dest_email"];
    $link_to_send = 'http://localhost/Conservatoire/phpCRUD/views/confirm_registration.php?code=conservatoire';
    sendEmail($dest_email, $link_to_send);
}

function sendEmail($receiver_email, $link) {
    $smtp_server = 'adresse_du_serveur_smtp'; // Remplacez par l'adresse du serveur SMTP de votre domaine
    $smtp_port = 587; // Le port peut varier, assurez-vous d'utiliser le port correct pour votre serveur SMTP
    $smtp_username = 'maram.omezzine@esprit.tn'; // Remplacez par votre adresse e-mail complète
    $smtp_password = ' decx pjkg dxnd vnce'; // Remplacez par votre mot de passe

    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host = $smtp_server;
        $mail->SMTPAuth = true;
        $mail->Username = $smtp_username;
        $mail->Password = $smtp_password;
        $mail->SMTPSecure = 'tls';
        $mail->Port = $smtp_port;

        $mail->setFrom($smtp_username, 'Votre Nom');
        $mail->addAddress($receiver_email);

        $mail->isHTML(false);
        $mail->Subject = 'Lien de confirmation';
        $mail->Body = "Bonjour,\n\nVoici le lien de confirmation : $link\n\nCordialement.";

        $mail->send();
        echo 'E-mail envoyé avec succès.';
    } catch (Exception $e) {
        echo 'Erreur lors de l\'envoi de l\'e-mail: ', $mail->ErrorInfo;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Envoyer un e-mail</title>
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
