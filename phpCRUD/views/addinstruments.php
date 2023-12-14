<?php
include '../Controller/instrumentsC.php';
include '../model/instruments.php';
$error = "";

// create client
$joueur = null;

// create an instance of the controller
$joueurC = new insC();

if (
    isset($_POST["nom"]) &&
    isset($_POST["tp"])  &&
    isset($_FILES["piece_jointe"])
) {
    if (
        !empty($_POST['nom']) &&
        !empty($_POST["tp"]) 
    ) {
        // Gestion du fichier téléchargé
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["piece_jointe"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Vérifiez si le fichier est une image
        if (isset($_POST["submit"])) {
            $check = getimagesize($_FILES["piece_jointe"]["tmp_name"]);
            if ($check !== false) {
                $uploadOk = 1;
            } else {
                $error = "Le fichier n'est pas une image.";
                $uploadOk = 0;
            }
        }

        // Vérifiez si le fichier existe déjà
        if (file_exists($target_file)) {
            $error = "Désolé, le fichier existe déjà.";
            $uploadOk = 0;
        }

        // Vérifiez la taille du fichier
        if ($_FILES["piece_jointe"]["size"] > 500000000) {
            $error = "Désolé, votre fichier est trop volumineux.";
            $uploadOk = 0;
        }

        // Autorisez certains formats de fichiers
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif"
        ) {
            $error = "Désolé, seuls les fichiers JPG, JPEG, PNG et GIF sont autorisés.";
            $uploadOk = 0;
        }

        // Vérifiez si $uploadOk est défini à 0 par une erreur
        if ($uploadOk == 0) {
            $error .= "<br>Le fichier n'a pas été téléchargé.";
        } else {
            // Si tout est correct, essayez de télécharger le fichier
            if (move_uploaded_file($_FILES["piece_jointe"]["tmp_name"], $target_file)) {
                echo "Le fichier " . htmlspecialchars(basename($_FILES["piece_jointe"]["name"])) . " a été téléchargé.";

                // Utilisez maintenant $target_file comme chemin d'accès pour la base de données
                $joueur = new ins(
                    null,
                    $_POST['nom'],
                    $_POST['tp'],
                    $target_file
                );

                $joueurC->addinstruments($joueur);
                header('Location: lisinstruments.php');
            } else {
                $error = "Une erreur s'est produite lors du téléchargement du fichier.";
            }
        }
    } else {
        $error = "Missing information";
    }
}
?>
<html lang="en">
<head>
    <!-- Your head content here -->
</head>
<body>
    <?php include 'header.php'; ?>
    <div class="container mt-200">
        <a href="lisinstruments.php">Back to list</a>
        <hr>
        <div id="error">
            <?php echo $error; ?>
        </div>
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <table>
                        <tr>
                            <td><label for="nom">nom :</label></td>
                            <td>
                                <input type="text" id="nom" name="nom" class="form-control" />
                                <span id="erreurnom" style="color: red"></span>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="tp">Type :</label></td>
                            <td>
                                <select id="tp" name="tp" class="form-control">
                                    <option value="4">Percussions</option>
                                    <option value="2">Cordes</option>
                                    <option value="3">Vents</option>
                                </select>
                                <span id="erreurtp" style="color: red"></span>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="piece_jointe">Pièce jointe :</label></td>
                            <td>
                                <input type="file" id="piece_jointe" name="piece_jointe" class="form-control" />
                                <span id="erreurpiece_jointe" style="color: red"></span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="submit" value="Save" class="btn btn-primary" />
                            </td>
                            <td>
                                <input type="reset" value="Reset" class="btn btn-secondary" />
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </form>
    </div>
    <?php include 'footer.php'; ?>
    <script src="tpsjn.js"></script>
</body>
</html>
