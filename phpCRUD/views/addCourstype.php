<?php
include '../Controller/CourstypeC.php';
include '../model/Courstype.php';

$error = "";
$success = "";

$CourstypeC = new CourstypeC();
$courstype = null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["nom_de_cours"]) && isset($_POST["type"])) {
        if (!empty($_POST['nom_de_cours']) && !empty($_POST["type"])) {
            if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
                $targetDir = "uploads/";

                if (!is_dir($targetDir)) {
                    mkdir($targetDir, 0777, true);
                }

                $targetFile = $targetDir . basename($_FILES["image"]["name"]);
                $uploadOk = 1;
                $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

                $check = getimagesize($_FILES["image"]["tmp_name"]);
                if ($check !== false) {
                    $uploadOk = 1;
                } else {
                    $error .= "Le fichier n'est pas une image.";
                    $uploadOk = 0;
                }

                if (file_exists($targetFile)) {
                    $error .= "Désolé, le fichier existe déjà.";
                    $uploadOk = 0;
                }

                if ($_FILES["image"]["size"] > 500000) {
                    $error .= "Désolé, votre fichier est trop volumineux.";
                    $uploadOk = 0;
                }

                if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
                    $error .= "Désolé, seuls les fichiers JPG, JPEG, PNG et GIF sont autorisés.";
                    $uploadOk = 0;
                }

                if ($uploadOk == 0) {
                    $error .= "Désolé, votre fichier n'a pas été téléchargé.";
                } else {
                    if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
                        $imagePath = $targetFile;

                        $courstype = new Courstype(
                            null,
                            $_POST['nom_de_cours'],
                            $_POST['type'],
                            $imagePath
                        );

                        $CourstypeC->addCourstype($courstype);
                        $success = "Cours ajouté avec succès!";
                    } else {
                        $error = "Erreur lors du téléchargement du fichier.";
                    }
                }
            }
        }
    }
}
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Courstype</title>
    <style>
 
    </style>
</head>

<body>


    <button><a href="listCourstypes.php">Back to list</a></button>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <div id="success">
        <?php echo $success; ?>
    </div>

    <form action="addCourstype.php" method="POST" enctype="multipart/form-data">
        <label for="nom_de_cours">Nom :</label>
        <input type="text" id="nom_de_cours" name="nom_de_cours" required />
        <br>

        <label for="type">Type :</label>
        <input type="text" id="type" name="type" required />
        <br>

        <label for="image">Image :</label>
        <input type="file" name="image" accept="image/*">
        <br>

        <input type="submit" value="Save">
    </form>
    
    <?php include 'footer.php';?>
</body>

</html>