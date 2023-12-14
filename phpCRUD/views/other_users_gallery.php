
<?php
require '../config.php';
session_start();

if (empty($_SESSION["id"])) {
    header("Location: login.php");
    exit();
}

$id = $_SESSION["id"];
$pdo = config::getConnexion();

$stmt = $pdo->prepare("SELECT DISTINCT user_images.id as image_id, user_images.image_path, tb_user.nom FROM user_images 
                      INNER JOIN tb_user ON user_images.user_id = tb_user.id 
                      WHERE user_images.user_id != ?");
$stmt->execute([$id]);
$images = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Other Users' Image Gallery</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f6f6f6;
            color: #333;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        header {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 20px 0;
        }

        main {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .other-users-gallery {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            grid-gap: 20px;
            justify-items: center;
        }

        .image-container {
            position: relative;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);
            width: 200px; /* Taille fixe pour chaque image */
        }

        .image-container img {
            width: 100%; /* Remplir le conteneur */
            height: auto;
            display: block;
            transition: transform 0.3s ease;
        }

        .image-container img:hover {
            transform: scale(1.05);
        }

        .image-details {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            padding: 8px;
            background-color: rgba(0, 0, 0, 0.7);
            color: #fff;
            text-align: center;
        }

        .user-name {
            margin-top: 5px;
            font-size: 14px;
        }

        .like-button {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 8px 16px;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin-top: 8px;
        }

        .like-button:hover {
            background-color: #0056b3;
        }
        .return-button {
            background-color: #4caf50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
            margin-top: 20px;
            display: inline-block;
            transition: background-color 0.3s ease;
        }

        .return-button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <!-- Header, Main, Footer -->

    <main>
        <section class="other-users-gallery">
            <h2>Other Users' Image Gallery</h2>
            <?php
            if (count($images) > 0) {
                foreach ($images as $image) {
                    $imagePath = $image['image_path'];
                    $userName = $image['nom'];
                    $imageId = $image['image_id'];

                    echo "<div class='image-container'>";
                    echo "<img src='$imagePath' alt='Uploaded by $userName'>";
                    echo "<div class='image-details'>";
                    echo "<p class='user-name'>$userName</p>";
                    echo "<form action='like.php' method='post'>";
                    echo "<input type='hidden' name='image_id' value='$imageId'>";
                    echo "<button class='like-button' type='submit' name='like'>Like</button>";
                    echo "</form>";

                    $likesStmt = $pdo->prepare("SELECT COUNT(*) AS like_count FROM likes WHERE image_id = ?");
                    $likesStmt->execute([$imageId]);
                    $likeCount = $likesStmt->fetchColumn();
                    echo "<p>Likes: $likeCount</p>";

                    echo "</div>"; // Fermer image-details
                    echo "</div>"; // Fermer image-container
                }
            } else {
                echo "<p>No images found for other users.</p>";
            }
            ?>
        </section>
        <?php
        // Vérification du rôle de l'utilisateur pour déterminer la redirection
        $userRole = $_SESSION['role'] ?? '';

        // Si l'utilisateur est un étudiant, le bouton redirige vers index.php
        // Si l'utilisateur est un admin, le bouton redirige vers indexad.php
        $redirectPage = ($userRole === 'admin') ? 'indexad.php' : 'index.php';
        ?>
        <a href="<?php echo $redirectPage; ?>" class="return-button">Retour</a>
    </main>
</body>
</html>
