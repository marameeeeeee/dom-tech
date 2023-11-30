<?php
require '../config.php'; 
session_start();

if (empty($_SESSION["id"])) {
    header("Location: login.php");
    exit();
}

$id = $_SESSION["id"];
$stmt = $conn->prepare("SELECT * FROM tb_user WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

if (!$row) {
    header("Location: login.php");
    exit();
}
// ...
if (isset($_POST['submit_image'])) {
    $targetDirectory = __DIR__ . '/uploads/';
    
    // Vérification des fichiers téléchargés
    if (!empty(array_filter($_FILES['files']['name']))) {
        foreach ($_FILES['files']['tmp_name'] as $key => $tmp_name) {
            $fileName = $_FILES['files']['name'][$key];
            $targetFile = $targetDirectory . basename($fileName);
            $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
            
            // Vérification du type de fichier
            $allowedTypes = ['jpg', 'jpeg', 'png', 'gif'];
            if (!in_array($imageFileType, $allowedTypes)) {
                echo "Seuls les fichiers JPG, JPEG, PNG et GIF sont autorisés.";
                exit();
            }

            // Déplacement des fichiers téléchargés vers le répertoire cible
            if (move_uploaded_file($_FILES['files']['tmp_name'][$key], $targetFile)) {
                $imagePath = 'uploads/' . $fileName;

                // Insertion du chemin de l'image en base de données
                $insertImageStmt = $conn->prepare("INSERT INTO user_images (user_id, image_path) VALUES (?, ?)");
                $insertImageStmt->bind_param("is", $id, $imagePath);
                $insertImageStmt->execute();
            } else {
                echo "Erreur lors du téléchargement du fichier.";
            }
        }
        header("Location: index.php");
        exit();
    }
}
// ...

if (isset($_POST['submit_info'])) {
    $age = $_POST['age'];
    $sex = $_POST['sex'];
    $bio = $_POST['bio'];

    $updateStmt = $conn->prepare("UPDATE tb_user SET age = ?, sex = ?, bio = ? WHERE id = ?");
    $updateStmt->bind_param("issi", $age, $sex, $bio, $id);
    $updateStmt->execute();

    header("Location: index.php");
    exit();
}

if (isset($_POST['change_photo'])) {
    $targetDirectory = __DIR__ . '/uploads/';
    $targetFile = $targetDirectory . basename($_FILES["profile_photo"]["name"]);
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
    
    $allowedTypes = ['jpg', 'jpeg', 'png', 'gif'];
    if (!in_array($imageFileType, $allowedTypes)) {
        echo "Seuls les fichiers JPG, JPEG, PNG et GIF sont autorisés.";
        exit();
    }

    if (move_uploaded_file($_FILES["profile_photo"]["tmp_name"], $targetFile)) {
        $imagePath = 'uploads/' . basename($_FILES["profile_photo"]["name"]);

        $updatePhotoStmt = $conn->prepare("UPDATE tb_user SET profile_photo = ? WHERE id = ?");
        $updatePhotoStmt->bind_param("si", $imagePath, $id);
        $updatePhotoStmt->execute();

        header("Location: index.php");
        exit();
    } else {
        echo "Erreur lors du téléchargement du fichier.";
    }
}
?>

<!-- ... (Votre code HTML existant) ... -->

<!-- ... (Votre code PHP existant pour la récupération des données et le traitement) ... -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Profile</title>
    <style>
        /* Réinitialisation des styles par défaut */
        /*{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }*/

        /* Styles pour le corps de la page */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f6f6f6;
            color: #333;
            line-height: 1.6;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Styles pour l'en-tête */
        header {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 20px 0;
        }

        header h1 {
            font-size: 24px;
        }

        /* Styles pour la section principale */
        main {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        /* Styles pour la section de la photo de profil */
        .profile-photo-section {
            text-align: center;
            margin-bottom: 30px;
        }

        .profile-photo-section h2 {
            margin-bottom: 10px;
            font-size: 20px;
        }

        .profile-photo-section img {
            max-width: 200px;
            border-radius: 50%;
            border: 5px solid #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        .profile-photo-section form {
            margin-top: 15px;
        }

        .profile-photo-section input[type="file"] {
            margin-bottom: 10px;
        }

        /* Styles pour la section des informations utilisateur */
        .user-info-section {
            margin-bottom: 30px;
        }

        .user-info-section h2 {
            font-size: 20px;
            margin-bottom: 15px;
        }

        .user-info-section input[type="text"],
        .user-info-section textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        .user-info-section textarea {
            height: 100px;
        }

        .user-info-section button#editInfoButton {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .user-info-section button#editInfoButton:hover {
            background-color: #0056b3;
        }

        /* Styles pour la section de la galerie d'images */
        .image-gallery-section {
            margin-bottom: 30px;
        }

        .image-gallery-section h2 {
            font-size: 20px;
            margin-bottom: 15px;
        }

        .image-gallery-section form {
            margin-top: 15px;
        }

        .image-gallery-section input[type="file"] {
            margin-bottom: 10px;
        }

        .image-gallery-section input[type="submit"] {
            padding: 8px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .image-gallery-section img {
            max-width: 150px;
            height: auto;
            margin-right: 10px;
            margin-bottom: 10px;
        }

        /* Styles pour la section de déconnexion */
        .logout-section {
            text-align: center;
        }

        .logout-section a {
            padding: 8px 20px;
            background-color: #dc3545;
            color: #fff;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .logout-section a:hover {
            background-color: #c82333;
        }
        /* Styles pour la section de la galerie d'images des autres utilisateurs */
.other-users-gallery {
    margin-bottom: 30px;
}

.other-users-gallery h2 {
    font-size: 20px;
    margin-bottom: 15px;
}

.other-users-gallery a {
    display: inline-block;
    padding: 8px 20px;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 5px;
    text-decoration: none;
    transition: background-color 0.3s ease;
}

.other-users-gallery a:hover {
    background-color: #0056b3;
}

    </style>
</head>
<body>
    <header>
        <?php include 'header.php'; ?>
    </header>

    <main>
        <!-- Section pour la photo de profil et le bouton pour la changer -->
        <section class="profile-photo-section">
            <h2><?php echo isset($row["nom"]) ? $row["nom"] : ''; ?>'s Profile</h2>
            <?php if(isset($row['profile_photo'])): ?>
                <img src="<?php echo $row['profile_photo']; ?>" alt="Profile Photo">
            <?php else: ?>
                <p>No profile photo found.</p>
            <?php endif; ?>
            <form action="index.php" method="post" enctype="multipart/form-data">
                <input type="file" name="profile_photo" accept="image/*">
                <input type="submit" name="change_photo" value="Change Profile Photo">
            </form>
        </section>

        <!-- Section pour afficher les informations de l'utilisateur et pour la modification -->
        <section class="user-info-section">
            <h2>User Information</h2>
            <p><strong>Name:</strong> <?php echo isset($row["nom"]) ? $row["nom"] : ''; ?></p>
            <p><strong>Age:</strong> <?php echo isset($row["age"]) ? $row["age"] : ''; ?></p>
            <p><strong>Sex:</strong> <?php echo isset($row["sex"]) ? $row["sex"] : ''; ?></p>
            <p><strong>Bio:</strong></p>
            <p><?php echo isset($row["bio"]) ? $row["bio"] : ''; ?></p>
            <form id="userInfoForm" action="index.php" method="post">
                <input type="text" name="age" placeholder="Enter Age">
                <input type="text" name="sex" placeholder="Enter Sex">
                <textarea name="bio" placeholder="Enter Bio"></textarea>
                <input type="submit" name="submit_info" value="Submit Info">
            </form>
            <button id="editInfoButton">Edit Info</button>
        </section>

        <!-- Section pour afficher la galerie d'images de l'utilisateur -->
        <section class="image-gallery-section">
            <h2>Image Gallery</h2>
            <?php
            // Récupérer les images associées à l'utilisateur depuis la base de données et les afficher
            $imagesQuery = $conn->prepare("SELECT image_path FROM user_images WHERE user_id = ?");
            $imagesQuery->bind_param("i", $id);
            $imagesQuery->execute();
            $imagesResult = $imagesQuery->get_result();

            while ($imageRow = $imagesResult->fetch_assoc()) {
                $imagePath = $imageRow['image_path'];
                echo "<img src='$imagePath'>";
            }
            ?>
            <form action="index.php" method="post" enctype="multipart/form-data">
                <input type="file" name="files[]" accept="image/*" multiple>
                <input type="submit" name="submit_image" value="Upload New Image(s)">
            </form>
        </section>
        <section class="other-users-gallery">
    <h2>Other Users' Image Gallery</h2>
    <a href="other_users_gallery.php">View Other Users' Gallery</a>
</section>


        <section class="logout-section">
            <a href="logout.php">Logout</a>
        </section>
    </main>

    <footer>
        <?php include 'footer.php'; ?>
    </footer>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const editInfoButton = document.getElementById('editInfoButton');
            const userInfoForm = document.getElementById('userInfoForm');

            editInfoButton.addEventListener('click', function() {
                userInfoForm.style.display = userInfoForm.style.display === 'none' ? 'block' : 'none';
            });
        });
    </script>
</body>
</html>
