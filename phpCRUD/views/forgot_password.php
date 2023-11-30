<?php
require '../config.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Include PHPMailer autoloader
require __DIR__ . '/../vendor/autoload.php';

if (isset($_POST["submit"])) {
    $email = $_POST["email"];

    // Récupération de la connexion PDO depuis la classe config
    $pdo = config::getConnexion();

    $stmt = $pdo->prepare("SELECT * FROM tb_user WHERE username = :email OR email = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $row = $stmt->fetch();

    if ($row) {
        $token = uniqid();

        $updateTokenStmt = $pdo->prepare("UPDATE tb_user SET reset_token = :token WHERE id = :id");
        $updateTokenStmt->bindParam(':token', $token);
        $updateTokenStmt->bindParam(':id', $row['id']);
        $updateTokenStmt->execute();

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
            $mail->Subject = 'Réinitialisation de votre mot de passe';
            $mail->Body = "Bonjour,\n\nPour réinitialiser votre mot de passe, veuillez cliquer sur ce lien : http://localhost/Conservatoire/phpCRUD/views/reset_password.php?token=$token\n\nCordialement, Votre site web";

            $mail->send();
            echo "<script>alert('E-mail envoyé avec succès pour la réinitialisation du mot de passe. Veuillez vérifier votre boîte de réception.');</script>";
        } catch (Exception $e) {
            echo "<script>alert('Erreur lors de l'envoi de l'e-mail : {$mail->ErrorInfo}');</script>";
        }
    } else {
        echo "<script> alert('Utilisateur non trouvé'); </script>";
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
<header>
    <?php include 'header.php'; ?>
</header>
<h2>Réinitialisation du mot de passe</h2>
<style>
    /* Ajoutez votre CSS pour styliser la page ici */
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    header,
    footer {
       /* background-color: #f2f2f2;*/
        padding: 30px;
    }

    h2 {
        margin-top: 20px;
    }

    form {
        margin-top: 20px;
        display: flex;
        flex-direction: column;
        max-width: 400px;
    }

    label,
    input {
        margin-bottom: 10px;
    }

    button {
        padding: 10px;
        background-color: #007bff;
        color: #fff;
        border: none;
        cursor: pointer;
    }

    button:hover {
        background-color: #0056b3;
    }
</style>
<form action="" method="post">
    <label for="email">Entrez votre adresse e-mail :</label>
    <input type="email" name="email" required>
    <button type="submit" name="submit">Réinitialiser le mot de passe</button>
</form>
<footer>
    <?php include 'footer.php'; ?>
</footer>
<!-- Le reste de votre contenu HTML ou le code PHP -->
</body>
</html>
