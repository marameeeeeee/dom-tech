<?php
require '../config.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Include PHPMailer autoloader
require __DIR__ . '/../vendor/autoload.php';

if (isset($_POST["submit"])) {
    $email = $_POST["email"];

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $result = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$email' OR email = '$email'");

    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $token = uniqid();

            mysqli_query($conn, "UPDATE tb_user SET reset_token = '$token' WHERE id = '{$row['id']}'");

            // Envoi de l'e-mail avec le lien de réinitialisation
            $mail = new PHPMailer(true);

            try {
                // Paramètres du serveur SMTP
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'walaeddine.riahi@esprit.tn'; // Remplacez par votre adresse e-mail
                $mail->Password = 'wallou12'; // Remplacez par votre mot de passe
                $mail->SMTPSecure = 'tls';
                $mail->Port = 587;

                // Destinataire
                $mail->setFrom('walaeddine.riahi@esprit.tn', 'walaeddine');
                $mail->addAddress($row['email'], $row['username']);

                // Contenu de l'e-mail
                $mail->isHTML(false);
                $mail->Subject = 'reinitialisation de votre mot de passe';
                $mail->Body = "Bonjour,\n\nPour réinitialiser votre mot de passe, veuillez cliquer sur ce lien : http://http://localhost/Conservatoire/phpCRUD/views/reset_password.php?token=$token\n\nCordialement, Votre site web";

                $mail->send();
                echo "<script>alert('E-mail envoyé avec succès pour la réinitialisation du mot de passe. Veuillez vérifier votre boîte de réception.');</script>";
            } catch (Exception $e) {
                echo "<script>alert('Erreur lors de l'envoi de l'e-mail : {$mail->ErrorInfo}');</script>";
            }
        } else {
            echo "<script> alert('Utilisateur non trouvé'); </script>";
        }
    } else {
        echo "Erreur: " . mysqli_error($conn);
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Réinitialisation du mot de passe</title>
    <!-- Les styles CSS ou d'autres liens -->
</head>
<body>
    <h2>Réinitialisation du mot de passe</h2>
    <form action="" method="post">
        <label for="email">Entrez votre adresse e-mail :</label>
        <input type="email" name="email" required>
        <button type="submit" name="submit">Réinitialiser le mot de passe</button>
    </form>
    <!-- Le reste de votre contenu HTML ou le code PHP -->
</body>
</html>
