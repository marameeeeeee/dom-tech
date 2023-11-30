<?php
// Connexion à la base de données
$servername = "localhost";
$username = "wallou";
$password = "wallou";
$dbname = "conservatoire";

// Création de la connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Récupérer les données des autres utilisateurs depuis la base de données
$sql = "SELECT users.nom, user_images.image_path 
        FROM users 
        INNER JOIN user_images ON users.id = user_images.user_id 
        ORDER BY user_images.date_column DESC";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Other Users Gallery</title>
    <style>
        /* Vos styles CSS pour la galerie */
        /* ... */
    </style>
</head>
<body>
    <header>
        <!-- En-tête de la page -->
    </header>

    <main>
        <h1>Other Users' Gallery</h1>

        <!-- Options de tri et de recherche -->
        <!-- ... -->

        <div class="image-grid">
            <?php
            // Affichage des images des autres utilisateurs
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="image-item">';
                    echo '<img src="' . $row['image_path'] . '" alt="User Image">';
                    echo '<p>' . $row['nom'] . '</p>'; // Affichage du nom de l'utilisateur
                    echo '</div>';
                }
            } else {
                echo "No images found.";
            }
            ?>
        </div>
    </main>

    <footer>
        <!-- Pied de page -->
    </footer>
</body>
</html>
