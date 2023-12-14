<?php

include '../Controller/PacksC.php';
include '../model/Packs.php';
$error = "";

// create client
$pack = null;
// create an instance of the controller
$PackC = new PackC();


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (
        !empty($_POST["types"]) &&
        !empty($_POST["nom"]) &&
        !empty($_POST["prix"]) &&
        !empty($_POST["description"])
    ) {
        // Existing pack information
        $pack = $PackC->showPack($_POST['id_pack']);
        
        // Assigning posted values
        $types = $_POST["types"];
        $nom = $_POST["nom"];
        $prix = $_POST["prix"];
        $description = $_POST["description"];
        
        // File upload handling
        if ($_FILES['image']['name']) {
            $targetDirectory = "../uploads/";
            $targetFile = $targetDirectory . basename($_FILES['image']['name']);
            $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
            $allowedExtensions = ["jpg", "jpeg", "png", "gif"];

            if (in_array($imageFileType, $allowedExtensions)) {
                if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
                    // Update pack information with the new image
                    $pack = new pack(null, $types, $nom, (int)$prix, $description, $_FILES['image']['name']);
                    $PackC->UpdatePack($pack, $_POST['id_pack']);

                    // Redirect after successful update
                    header('Location: ListPack.php');
                    exit();
                } else {
                    $error = "Error uploading the file.";
                }
            } else {
                $error = "Invalid file type. Only JPG, JPEG, PNG & GIF files are allowed.";
            }
        } else {
            // Update pack information without changing the image
            $pack = new pack(null, $types, $nom, (int)$prix, $description, $pack['image']);
            $PackC->UpdatePack($pack, $_POST['id_pack']);

            // Redirect after successful update
            header('Location: ListPack.php');
            exit();
        }
    } else {
        $error = "Missing information";
    }
}


?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Display</title>
</head>

<body>
<?php include 'header.php'; ?>
<div class="container mt-200">
    <button><a href="Listpack.php">Back to list</a></button>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <?php
    if (isset($_POST['id_pack'])) {
        $pack = $PackC->showPack($_POST['id_pack']);
        
    ?>

        <form action="" method="POST">
            <table>
            <tr>
                    <td><label for="id_pack">Id PACK :</label></td>
                    <td>
                        <input type="text" id="id_pack" name="id_pack" value="<?php echo $_POST['id_pack'] ?>" readonly />
                        <span id="erreurIdpack" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="types"> Types :</label></td>
                    <td>
                        <input type="text" id="types" name="types" value="<?php echo $pack['types'] ?>" />
                        <span id="erreurTypes" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="nom"> Nom :</label></td>
                    <td>
                        <input type="text" id="nom" name="nom" value="<?php echo $pack['nom'] ?>" />
                        <span id="erreurNom" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="prix"> Prix :</label></td>
                    <td>
                        <input type="text" id="prix" name="prix" value="<?php echo $pack['prix'] ?>" />
                        <span id="erreurPrix" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="description"> Description :</label></td>
                    <td>
                        <input type="text" id="description" name="description" value="<?php echo $pack['description'] ?>" />
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
    <?php
    }
    ?>
</body>

</html>