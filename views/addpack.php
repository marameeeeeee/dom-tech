<?php
$error = '';

require '../Controller/PacksC.php';
require '../model/Packs.php';

$PackC = new PackC();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $types = $_POST['types'] ?? '';
    $nom = $_POST['nom'] ?? '';
    $prix = $_POST['prix'] ?? '';
    $description = $_POST['description'] ?? '';
    $image = $_FILES['image'] ?? null;

    if (!empty($types) && !empty($nom) && !empty($prix) && !empty($description) && $image !== null) {
        // File upload handling
        $targetDirectory = "../uploads/";
        $targetFile = $targetDirectory . basename($image['name']);

        // Check file type
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
        $allowedExtensions = ["jpg", "jpeg", "png", "gif"];

        if (in_array($imageFileType, $allowedExtensions)) {
            if (move_uploaded_file($image['tmp_name'], $targetFile)) {
                // Create a pack object with the provided data
                $pack = new pack(null, $types, $nom, (int)$prix, $description, $image['name']);
                
                // Add pack to the database
                $PackC->AddPack($pack);

                // Redirect after successful insertion
                header('Location: ListPack.php');
                exit();
            } else {
                $error = "Error uploading the file.";
            }
        } else {
            $error = "Invalid file type. Only JPG, JPEG, PNG & GIF files are allowed.";
        }
    } else {
        $error = "Validation failed. Please check your input.";
    }
}
/*
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $types = $_POST['types'] ?? '';
    $nom = $_POST['nom'] ?? '';
    $prix = $_POST['prix'] ?? '';
    $description = $_POST['description'] ?? '';
    $image = $_FILES['image'] ?? null;

    if (!empty($types)) {
        $pack = new pack(
            null,
            $types,
            $nom,
            (int)$prix,
            $description,
            $image['name'] // Use the file name for the image field
        );

        // File upload handling
        $targetDirectory = "uploads"; // Adjust the directory path as needed
        $targetFile = $targetDirectory . basename($image['name']);

        $imageData = getimagesize($image['tmp_name']);
        if ($imageData !== false) {
            $mimeType = $imageData['mime'];
            $allowedMimeTypes = array(
                'image/jpeg',
                'image/png',
                'image/gif'
            );

            if (in_array($mimeType, $allowedMimeTypes)) {
                if (move_uploaded_file($image['tmp_name'], $targetFile)) {
                    // File uploaded successfully, proceed to add pack
                    $PackC->AddPack($pack);
                    header('Location: ListPack.php');
                    exit();
                } else {
                    $error = "Error uploading the file.";
                }
            } else {
                $error = "Invalid file type. Only JPG, JPEG, PNG & GIF files are allowed.";
            }
        } else {
            $error = "Invalid file format. Please upload an image.";
        }
    } else {
        $error = "Validation failed. Please check your input.";
    }
}*/
// Display error or other HTML content as needed


?>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pack</title>
    <script>
        function validateForm() {
            var types = document.getElementById('types').value;
            var nom = document.getElementById('nom').value;
            var prix = document.getElementById('prix').value;
            var description = document.getElementById('description').value;
            var image = document.getElementById('image').value;
        }
    </script>
</head>

<body>
<?php include 'header.php'; ?>
<div class="container mt-200">
    <a href="ListPack.php"> Back to list </a>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <form action="" method="POST" enctype="multipart/form-data">
    
        <table>
            <tr>
                <td><label for="types"> Type :</label></td>
                <td>
                    <input type="text" id="types" name="types" />
                    <span id="erreurTypes" style="color: red"></span>
                </td>
            </tr>
            <tr>
                <td><label for="nom"> Nom :</label></td>
                <td>
                    <input type="text" id="nom" name="nom" />
                    <span id="erreurNom" style="color: red"></span>
                </td>
            </tr>
            <tr>
                <td><label for="prix"> Prix :</label></td>
                <td>
                    <input type="text" id="prix" name="prix" />
                    <span id="erreurPrix" style="color: red"></span>
                </td>
            </tr>
            <tr>
                <td><label for="description"> Description :</label></td>
                <td>
                    <input type="text" id="description" name="description" />
                    <span id="erreurDescription" style="color: red"></span>
                </td>
            </tr>
            <tr>
            <td><label for="image"> Image :</label></td>
<td>
    <input type="file" id="image" name="image" accept="image/*" />
    <span id="erreurImage" style="color: red"></span>
</td>
            </tr>


            <td>
                <input type="submit" value="Save">
            </td>
            <td>
                <input type="reset" value="Reset">
            </td>
        </table>

    </form>
    </div>
    <?php include 'footer.php'; ?>
    <script src="inputcontrol.js" defer></script>
</body>

</html>