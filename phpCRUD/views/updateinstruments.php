<?php
include '../Controller/instrumentsC.php';
include '../model/instruments.php';

$error = "";

// create an instance of the controller
$joueurC = new insC();

// create client
$joueur = null;

if (isset($_POST["nom"]) && isset($_POST["tp"])) {
    if (!empty($_POST['nom']) && !empty($_POST["tp"])) {
         
        foreach ($_POST as $key => $value) {
            echo "Key: $key, Value: $value<br>";
        }

        $joueur = new ins(
            null,
            $_POST['nom'],
            $_POST['tp'],
            
        );

        var_dump($joueur);

        $joueurC->updateinstruments($joueur, $_POST['id_in']);

        header('Location: lisinstruments.php');
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
    <button><a href="lisinstruments.php">Back to list</a></button>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <?php
    if (isset($_POST['id_in'])) {
        $joueur = $joueurC->showinstruments($_POST['id_in']);
    ?>

        <form action="" method="POST">
            <table>
                <tr>
                    <td><label for="id_in">Id :</label></td>
                    <td>
                        <input type="text" id="id_in" name="id_in" value="<?php echo $_POST['id_in'] ?>" readonly />
                        <span id="erreurid_in" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="nom">Nom :</label></td>
                    <td>
                        <input type="text" id="nom" name="nom" value="<?php echo $joueur['nom'] ?>" />
                        <span id="erreurnom" style="color: red"></span>
                    </td>
                </tr>
               

                <tr>
    <td><label for="tp">Type :</label></td>
    <td>
        <select id="tp" name="tp" class="form-control" value="<?php echo $joueur['tp'] ?>"> 
            <option value="118">Percussions</option>
            <option value="115">Cordes</option>
            <option value="116">Vents</option>
        </select>
        <span id="erreurtp" style="color: red"></span>
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
    <script src="tpsjn.js"></script>
</body>

</html>
