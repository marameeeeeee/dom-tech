<?php
require '../config.php';

if(!empty($_SESSION["id"])){
    header("Location: index.php");
}

if (isset($_POST["submit"])) {
    header("Location: index.php");
}
if (isset($_POST["submit"])) {
    $nom = $_POST["nom"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirmpassword = $_POST["confirmpassword"];

    $duplicate = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$username' OR email = '$email'");
    if (mysqli_num_rows($duplicate) > 0) {
        echo "<script> alert('Username or Email Has Already Been Taken'); </script>";
    } else {
        if ($password == $confirmpassword) {
            $query = "INSERT INTO tb_user VALUES ('', '$nom', '$username', '$email', '$password')";
            mysqli_query($conn, $query);
            echo "<script> alert('Registration Successful'); </script>";
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

        header, footer {
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
        }

        label, input, button {
            margin-bottom: 10px;
        }

        button {
            padding: 8px 12px;
            background-color: #333;
            color: white;
            border: none;
            border-radius: 3px;
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
    <?php include 'header.php'; ?>
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
            <button type="submit" name="submit">Register</button>
        </form>
        <br>
        <a href="login.php">Login</a>
    </main>
    <?php include 'footer.php'; ?>
</body>
</html>