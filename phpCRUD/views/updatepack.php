<?php

include '../Controller/PacksC.php';
include '../model/Packs.php';
$error = "";

// create client
$pack = null;
// create an instance of the controller
$PackC = new PackC();


if (
    isset($_POST["nom"]) &&
    isset($_POST["price"]) &&
    isset($_POST["types"]) &&
    isset($_POST["duration"])
) {
    if (
        !empty($_POST['nom']) &&
        !empty($_POST["price"]) &&
        !empty($_POST["types"]) &&
        !empty($_POST["duration"])
    ) {
        foreach ($_POST as $key => $value) {
            echo "Key: $key, Value: $value<br>";
        }
        $pack = new pack(
            null,
            $_POST['nom'],
            $_POST['price'],
            $_POST['types'],
            $_POST['duration']
        );
        var_dump($pack);
        
        $PackC->updatePack($pack, $_POST['idpack']);

        header('Location:listpacks.php');
    } else
        $error = "Missing information";
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
    <button><a href="listpacks.php">Back to list</a></button>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <?php
    if (isset($_POST['idpack'])) {
        $pack = $PackC->showPack($_POST['idpack']);
        
    ?>

        <form action="" method="POST">
            <table>
            <tr>
                    <td><label for="nom">Id PACK :</label></td>
                    <td>
                        <input type="text" id="idpack" name="idpack" value="<?php echo $_POST['idpack'] ?>" readonly />
                        <span id="erreurNom" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="nom">Name :</label></td>
                    <td>
                        <input type="text" id="nom" name="nom" value="<?php echo $pack['nom'] ?>" />
                        <span id="erreurNom" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="price">Price :</label></td>
                    <td>
                        <input type="text" id="price" name="price" value="<?php echo $pack['price'] ?>" />
                        <span id="erreurPrice" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="types"> Types :</label></td>
                    <td>
                        <input type="text" id="types" name="types" value="<?php echo $pack['types'] ?>" />
                        <span id="erreurpack" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="duration">Duration :</label></td>
                    <td>
                        <input type="text" id="duration" name="duration" value="<?php echo $pack['duration'] ?>" />
                        <span id="erreurduration" style="color: red"></span>
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