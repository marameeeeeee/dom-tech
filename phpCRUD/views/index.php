<?php
require '../config.php'; 

if (!empty($_SESSION["id"])) {
    $id = $_SESSION["id"];
    $result = mysqli_query($conn, "SELECT * FROM tb_user WHERE id = $id");
    $row = mysqli_fetch_assoc($result);
    
    if (!$row) {
        header("Location: login.php");
        exit(); // Terminate the script to avoid further code execution
    }
} else {
    header("Location: login.php");
    exit(); // Terminate the script to avoid further code execution
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Index</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            display: flex;
            min-height: 100vh;
            flex-direction: column;
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
        }

        h1 {
            margin-bottom: 20px;
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
        <h1>Welcome <?php echo isset($row["nom"]) ? $row["nom"] : ''; ?></h1>
        <a href="logout.php">Logout</a>
    </main>
    <?php include 'footer.php'; ?>
</body>
</html>
