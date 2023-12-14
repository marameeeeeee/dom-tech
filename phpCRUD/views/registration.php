<?php
require '../config.php';
require_once '../Exception.php';
require_once '../PHPMailer.php';
require_once '../SMTP.php';
require_once __DIR__ . '/../vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$conn = config::getConnexion();

function generateUniqueCode($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $code = '';

    for ($i = 0; $i < $length; $i++) {
        $code .= $characters[rand(0, strlen($characters) - 1)];
    }

    return $code;
}

if (!empty($_SESSION["id"])) {
    header("Location: index.php");
    exit();
}

if (isset($_POST["submit"])) {
    $nom = $_POST["nom"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirmpassword = $_POST["confirmpassword"];
    $usertype = $_POST["usertype"];

    $stmt = $conn->prepare("SELECT * FROM tb_user WHERE username = :username OR email = :email");
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        echo "<script> alert('Username or Email Has Already Been Taken'); </script>";
    } else {
        if ($password == $confirmpassword) {
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $confirmationCode = generateUniqueCode();

            $insertStmt = $conn->prepare("INSERT INTO tb_user (nom, username, email, password, confirmation_code, status, usertype) VALUES (:nom, :username, :email, :password, :confirmation_code, 'unconfirmed', :usertype)");
            $insertStmt->bindParam(':nom', $nom);
            $insertStmt->bindParam(':username', $username);
            $insertStmt->bindParam(':email', $email);
            $insertStmt->bindParam(':password', $hashedPassword);
            $insertStmt->bindParam(':confirmation_code', $confirmationCode);
            $insertStmt->bindParam(':usertype', $usertype);
            $insertStmt->execute();

            $mail = new PHPMailer(true);
            try {
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'walaeddine.riahi@esprit.tn';
                $mail->Password = 'wallou12';
                $mail->SMTPSecure = 'tls';
                $mail->Port = 587;

                $mail->setFrom('walaeddine.riahi@esprit.tn', 'walaeddine');
                $mail->addAddress($email, $nom);
                $mail->Subject = 'Confirm Registration';

                // Utilisation du format HTML pour le contenu du mail
                $mail->isHTML(true);
                

                $mailContent= '
<html>
<head>
    <title>Confirm Registration</title>
    <style>
    body {
        font-family: "Arial", sans-serif;
        background-color: #f5f5f5;
        margin: 0;
        padding: 0;
    }

    .container {
        width: 80%;
        margin: 20px auto;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .header {
        background-color: #007bff;
        color: #fff;
        padding: 20px;
        text-align: center;
        border-top-left-radius: 8px;
        border-top-right-radius: 8px;
    }

    .content {
        padding: 30px;
        color: #333;
    }

    .content p {
        margin-bottom: 20px;
    }

    .cta-button {
        display: inline-block;
        padding: 10px 20px;
        background-color: #007bff;
        color: #fff;
        text-decoration: none;
        border-radius: 5px;
    }

    .cta-button:hover {
        background-color: #0056b3;
    }

    .footer {
        text-align: center;
        padding: 20px;
        font-size: 14px;
        color: #666;
    }
</style>
</head>
<body>
<div class="container">
<div class="header">
    <h1>Confirm Registration</h1>
</div>
<div class="content">
    <p>Hello <?php echo $nom; ?>,</p>
    <p>Thank you for registering!</p>
    <p>Please click the link below to confirm your registration:</p>
    <a href="http://localhost/Conservatoire/phpCRUD/views/confirm_registration.php?code=;<?php echo $confirmationCode; ?>" class="cta-button">Confirm Registration</a>
    <p>If you didnt register on our platform, you can ignore this email.</p>
</div>
<div class="footer">
    <p>Best regards,<br>walaeddine</p>
</div>
</div>
</body>
</html>
';
                $mail->Body = $mailContent;

                $mail->send();
                echo "<script> alert('Registration Successful. Please check your email to confirm.'); </script>";
            } catch (Exception $e) {
                echo "<script> alert('Message could not be sent. Mailer Error: {$mail->ErrorInfo}'); </script>";
            }
        } else {
            echo "<script> alert('Password Does Not Match'); </script>";
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Registration</title>
    <!-- Add your CSS links here -->
    <style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: Arial, sans-serif;
        display: flex;
        flex-direction: column;
        min-height: 100vh;
    }

    header,
    footer {
        background-color: #333;
        color: white;
        padding: 20px;
        text-align: center;
    }

    main {
        flex: 1;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        padding: 20px;
    }

    form {
        width: 300px;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
        display: flex;
        flex-direction: column;
        margin-top: 20px; /* Ajout d'une marge en haut du formulaire */
    }

    label,
    input,
    select,
    button {
        margin-bottom: 10px;
    }

    input,
    select,
    button {
        padding: 8px 12px;
        border-radius: 3px;
        border: 1px solid #ccc;
        transition: border-color 0.3s ease;
    }

    input:focus,
    select:focus {
        outline: none;
        border-color: #333; /* Changement de la couleur de la bordure en focus */
    }

    button {
        background-color: #333;
        color: white;
        border: none;
        cursor: pointer;
    }

    button:hover {
        background-color: #555;
    }

    a {
        text-decoration: none;
        color: #333;
    }
</style>

</head>
<body>
    <!-- Votre contenu d'en-tête -->
    <header>
        <?php include 'header.php'; ?>
    </header>
    <main>
        <h2>Registration</h2>
        <form class="" action="" method="post" autocomplete="off">
            <label for="nom">Nom:</label>
            <input type="text" name="nom" id="nom" required value=""><br>
            <label for="username">Username:</label>
            <input type="text" name="username" id="username" required value=""><br>
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" required value=""><br>
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required value=""><br>
            <label for="confirmpassword">Confirm Password:</label>
            <input type="password" name="confirmpassword" id="confirmpassword" required value=""><br>
            <label for="usertype">User Type:</label>
            <select name="usertype" id="usertype">
                <option value="admin">Admin</option>
                <option value="etudiant">Étudiant</option>
            </select><br>
            <button type="submit" name="submit">Register</button>
        </form>
        <br>
        <a href="login.php">Login</a>
    </main>
    <!-- Votre contenu de pied de page -->
    <footer>
        <?php include 'footer.php'; ?>
    </footer>
</body>
</html>
