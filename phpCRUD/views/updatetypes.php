<?php
include '../Controller/typesC.php';
include '../model/type.php';

$error = "";

// create an instance of the controller
$joueurC = new typeC();

// create client
$joueur = null;

if (isset($_POST["titre"]) && isset($_POST["descriptions"])) {
    if (!empty($_POST['titre']) && !empty($_POST["descriptions"])) {
        foreach ($_POST as $key => $value) {
            echo "Key: $key, Value: $value<br>";
        }

        $joueur = new type(
            null,
            $_POST['titre'],
            $_POST['descriptions']
        );

        var_dump($joueur);

        $joueurC->updatetypes($joueur, $_POST['id_type']);

        header('Location: listtypes.php');
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
    <button><a href="listtypes.php">Back to list</a></button>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <?php
    if (isset($_POST['id_type'])) {
        $joueur = $joueurC->showtypes($_POST['id_type']);
    ?>

        <form action="" method="POST">
            <table>
                <tr>
                    <td><label for="id_type">Id :</label></td>
                    <td>
                        <input type="text" id="id_type" name="id_type" value="<?php echo $_POST['id_type'] ?>" readonly />
                        <span id="erreurid_type" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="titre">Titre :</label></td>
                    <td>
                        <input type="text" id="titre" name="titre" value="<?php echo $joueur['titre'] ?>" />
                        <span id="erreurtitre" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="descriptions">Descriptions :</label></td>
                    <td>
                        <input type="text" id="descriptions" name="descriptions" value="<?php echo $joueur['descriptions'] ?>" />
                        <span id="erreurdescriptions" style="color: red"></span>
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
    <?php include 'footer.php'; ?>
    <script src="controle.js"></script>
</body>

</html>
