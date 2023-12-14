<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['contacter'])) {
    $senderEmail = "ahmedboutrif5@gmail.com";
    $recipientEmail = "ahmedboutrif5@gmail.com";
    $subject = "Demande de contact";
    $message = "Bonjour, je souhaite vous contacter.";

    // Paramètres SMTP
    $smtpHost = "smtp.gmail.com";
    $smtpUsername = "ahmedboutrif5@gmail.com";
    $smtpPassword = "homsmnafakh"; // Remplacez par votre mot de passe Gmail

    $mail = new PHPMailer(true);

    try {
        // Paramètres du serveur SMTP
        $mail->isSMTP();
        $mail->Host       = $smtpHost;
        $mail->SMTPAuth   = true;
        $mail->Username   = $smtpUsername;
        $mail->Password   = $smtpPassword;
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        // Destinataire, expéditeur, sujet et message
        $mail->setFrom($senderEmail);
        $mail->addAddress($recipientEmail);
        $mail->Subject = $subject;
        $mail->Body    = $message;

        // Envoyer l'e-mail
        $mail->send();
        echo "E-mail envoyé avec succès.";
    } catch (Exception $e) {
        echo "Erreur lors de l'envoi de l'e-mail : {$mail->ErrorInfo}";
    }
} else {
    echo "Erreur : Le formulaire de contact n'a pas été soumis.";
}

?>
