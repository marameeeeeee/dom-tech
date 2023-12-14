<?php
require '../config.php';
session_start();

if (isset($_SESSION['login'])) {
    header("Location: index.php");
    exit();
}

if (isset($_POST["submit"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $pdo = config::getConnexion();

    $stmt = $pdo->prepare("SELECT * FROM tb_user WHERE username = :email OR email = :email");
    $stmt->execute(['email' => $email]);
    $user = $stmt->fetch();

    if ($user) {
        $hashedPassword = $user["password"];

        // Vérification du mot de passe
        if (password_verify($password, $hashedPassword)) {
            $_SESSION["login"] = true;
            $_SESSION["id"] = $user["id"];
            $currentDateTime = date("Y-m-d H:i:s"); // Format de date et heure actuelle
    $updateLastLogin = $pdo->prepare("UPDATE tb_user SET last_time_connected = :currentDateTime WHERE id = :userId");
    $updateLastLogin->execute(['currentDateTime' => $currentDateTime, 'userId' => $user["id"]]);
            

    
    // Récupération du type d'utilisateur depuis la base de données
    
    $userType = $user["usertype"]; // Assurez-vous que cette colonne existe dans votre table

    
            if ($userType === "etudiant") {
                header("Location: index.php"); // Redirection pour les étudiants
                exit();
            } elseif ($userType === "admin") {
                header("Location: indexad.php"); // Redirection pour les admins
                exit();
            } else {
                // Gestion d'un cas où le type d'utilisateur n'est pas spécifié
                echo "<script> alert('User type not specified.'); </script>";
            }
        } else {
            echo "<script> alert('Wrong Password'); </script>";
        }
    } else {
        echo "<script> alert('User Not Registered'); </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Login</title>
    <!-- Add your CSS links here -->
    <style>
        body {
            display: flex;
            min-height: 100vh;
            flex-direction: column;
            margin: 0;
            font-family: Arial, sans-serif;
        }

        header, main, footer {
            width: 100%;
            flex-shrink: 0;
            background-color: #333;
            color: white;
            padding: 20px;
            text-align: center;
        }

        main {
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 300px;
            border: 1px solid #ccc;
            padding: 20px;
            border-radius: 5px;
        }

        label,
        input,
        button {
            margin-bottom: 10px;
        }

        input,
        button {
            padding: 8px 12px;
            border-radius: 3px;
            border: 1px solid #ccc;
            transition: border-color 0.3s ease;
        }

        input:focus {
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
        <h2>Login</h2>
        <form action="" method="post" autocomplete="off">
            <label for="email">Username or Email:</label>
            <input type="text" name="email" id="email" required value=""><br>
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required value=""><br>
            <button type="submit" name="submit">Login</button>
        </form>
        <br>
        <a href="forgot_password.php">Forgot Password?</a>
        <br>
        <a href="registration.php">Registration</a>
    </main>
    <footer>
        <?php include 'footer.php'; ?>
    </footer>
    <!-- Votre contenu de pied de page -->
</body>
</html>
