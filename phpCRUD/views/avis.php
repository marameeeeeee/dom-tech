<?php
require '../config.php'; // Make sure to include the database configuration file here
$pdo = config::getConnexion(); // Initialize your database connection

// Retrieve all reviews from the database
$stmt = $pdo->query("SELECT * FROM avis");
$avis = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reviews</title>
    <style>
        /* Styling for formatting, adaptable based on your preferences */
        body {
            font-family: Arial, sans-serif;
            background-color: #f6f6f6;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .container {
            width: 80%;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #333;
            text-align: center;
            margin-bottom: 20px;
        }

        .review {
            border-bottom: 1px solid #ccc;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }

        .review p {
            margin: 5px 0;
        }
        .return-btn {
            display: inline-block;
            padding: 8px 16px;
            background-color: #333;
            color: #fff;
            text-decoration: none;
            border: none;
            border-radius: 4px;
        }

        .return-btn:hover {
            background-color: #555;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>List of Reviews</h2>
        <?php
        // Display each review
        foreach ($avis as $avisItem) {
            echo '<div class="review">';
            echo '<p><strong>User:</strong> ' . htmlspecialchars($avisItem['utilisateur']) . '</p>';
            echo '<p><strong>Review:</strong> ' . htmlspecialchars($avisItem['contenu']) . '</p>';
            // Add more review information if needed
            echo '</div>';
        }
        ?>
    </div>
    <a href="indexad.php" class="return-btn">Back to Profile</a>
</body>
</html>
