<?php

include '../Controller/EvenementtypeC.php';
include '../model/Evenementtype.php';

$error = "";
$errornom = "";
$errorType_event = "";
$errordescription = "";

$evenementtypeC = new EvenementtypeC();

if (isset($_POST["nom"]) && isset($_POST["type_event"]) && isset($_POST["description"])) {
    if (!empty($_POST['nom']) && !empty($_POST["type_event"]) && !empty($_POST["description"])) {
        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $targetDir = "uploads/";
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
                    $evenementtype = new Evenementtype(
                        null,
                        $_POST['nom'],
                        $_POST['type_event'],
                        $_POST['description'],
                        $imagePath
                    );
                    $evenementtypeC->addEvenementtype($evenementtype);
                    header('Location:listEvenementtypes.php');
                } else {
                    $error .= "Désolé, une erreur s'est produite lors du téléchargement de votre fichier.";
                }
            }
        } else {
            $error .= "Image non spécifiée.";
        }
    } else {
        $error = "Informations manquantes.";
    }

    if (empty($_POST['nom'])) {
        $errornom = "Veuillez remplir correctement le nom.";
    }

    if (empty($_POST['type_event'])) {
        $errorType_event = "Veuillez remplir correctement le type.";
    }

    if (empty($_POST['description'])) {
        $errordescription = "Veuillez remplir correctement la description.";
    }
}

?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Evenementtype</title>
   

</head>

<body>
    <?php include 'header.php'; ?>
    <div class="container mt-200">
        <a href="listEvenementtypes.php">Retour à la liste</a>
        <hr>

        <div id="error">
            <?php echo $error; ?>
        </div>

        <form action="addEvenementtype.php" method="POST" enctype="multipart/form-data">
            <table>
                <tr>
                    <td><label for="image">Image :</label></td>
                    <td>
                        <input type="file" id="image" name="image" accept="image/*" />
                        <div id="erreurImage" style="color: red"></div>
                    </td>
                </tr>

                <tr>
                    <td><label for="nom">Nom :</label></td>
                    <td>
                        <input type="text" id="nom" name="nom" />
                        <span id="erreurNom" style="color: red"></span>
                        <div id="erreurnom">
                            <?php echo $errornom; ?>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td><label for="type_event">Type :</label></td>
                    <td>
                        <input type="text" id="type_event" name="type_event" />
                        <span id="erreurType_event" style="color: red"></span>
                        <div id="erreurType_event">
                            <?php echo $errorType_event; ?>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td><label for="description">Description :</label></td>
                    <td>
                        <input type="text" id="description" name="description" />
                        <span id="erreurdescription" style="color: red"></span>
                        <div id="erreurdescription">
                            <?php echo $errordescription; ?>
                        </div>
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
        <?php include 'footer.php'; ?>
    </body>
</html>
