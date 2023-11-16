<?php
include '../Controller/JoueurC.php';
include '../model/Joueur.php';
$error = "";

// create client
$joueur = null;
// create an instance of the controller
$joueurC = new JoueurC();

if (isset($_POST['id_event'])) {
    $joueur = $joueurC->showJoueur($_POST['id_event']);
}

if (isset($_POST["nom"]) && isset($_POST["type"]) && isset($_POST["description"])) {
    if (
        !empty($_POST['nom']) &&
        !empty($_POST["type"]) &&
        !empty($_POST["description"])
    ) {
        foreach ($_POST as $key => $value) {
            echo "Key: $key, Value: $value<br>";
        }
        $joueur = new Joueur(
            null,
            $_POST['nom'],
            $_POST['type'],
            $_POST['description']
        );
        var_dump($joueur);

        $joueurC->updateJoueur($joueur, $_POST['id_event']);

        header('Location: listJoueurs.php');
        exit(); // Make sure to exit after a header redirect
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
    <button><a href="listJoueurs.php">Back to list</a></button>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <?php
    if (isset($_POST['id_event'])) {
    ?>

        <form action="" method="POST"> <!-- Corrected form action -->
            <table>
                <tr>
                    <td><label for="id_event">id_event :</label></td>
                    <td>
                        <input type="text" id="id_event" name="id_event" value="<?php echo $_POST['id_event'] ?>" readonly />
                        <span id="erreurNom" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="nom">Nom :</label></td>
                    <td>
                        <input type="text" id="nom" name="nom" value="<?php echo $joueur['nom'] ?>" />
                        <span id="erreurNom" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="type">type :</label></td>
                    <td>
                        <input type="text" id="type" name="type" value="<?php echo $joueur['type'] ?>" />
                        <span id="erreurtypt" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="description">description :</label></td>
                    <td>
                        <input type="text" id="description" name="description" value="<?php echo $joueur['description'] ?>" />
                        <span id="erreurEmail" style="color: red"></span>
                    </td>
                </tr>

                <tr>
                    <td>
                        <input type="submit" value="Save">
                    </td>
                    <td>
                        <input type="reset" value="Reset">
                    </td>
                </tr>
            </table>
        </form>
    <?php
    }
    ?>
</body>

</html>
