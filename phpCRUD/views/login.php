<?php
require '../config.php';


if (!empty($_SESSION["id"])) {

$usernameemail = $_POST["email"]; $password= $_POST["password"];
$result=mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$usernameemail' OR email= '$email'");
$row = mysqli_fetch_assoc($result);
if(mysqli_num_rows($result) > 0){
if($password == $row["password"]){ 
    $_SESSION["login"] = true; 
    $_SESSION["id"] = $row["id"];

    header("Location: index.php");
}
    exit(); // Arrêter l'exécution du script après la redirection
}
}

if(isset($_POST["submit"])){
    $email = $_POST["email"];
    $password = $_POST["password"];
    
    // Vérification de la connexion à la base de données
    if(!$conn) {
        // Gérer l'erreur de connexion
        die("Connection failed: " . mysqli_connect_error());
    }
    $email = $_POST["email"];
    $result = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$email' OR email = '$email'");
    
    if($result){
        if(mysqli_num_rows($result) > 0){
            $row = mysqli_fetch_assoc($result);
            if ($password == $row["password"]){
                $_SESSION["login"] = true;
                $_SESSION["id"] = $row["id"];
                header("Location: index.php");
                exit(); // Arrêter l'exécution du script après la redirection
            } else {
                echo "<script> alert('Wrong Password'); </script>";
            }
        } else {
            echo "<script> alert('User Not Registered'); </script>";
        }
    } else {
        echo "Error: " . mysqli_error($conn);
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

        label, input, button {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <?php include 'header.php'; ?>
    <main>
        <h2>Login</h2>
        <form class="" action="" method="post" autocomplete="off">
            <label for="email">Username or Email :</label>
            <input type="text" name="email" id="email" required value=""> <br>
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required value=""> <br>
            <button type="submit" name="submit">Login</button>
        </form>
        <br>
        <a href="registration.php">Registration</a>
    </main>
    <?php include 'footer.php'; ?>
</body>
</html>