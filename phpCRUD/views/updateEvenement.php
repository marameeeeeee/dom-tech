<?php
include '../Controller/EvenementC.php';
include '../model/Evenement.php';
$error = "";

// create client
$evenement = null;
// create an instance of the controller
$EvenementC = new EvenementC();

if (isset($_POST['id'])) {
    $evenement = $EvenementC->showEvenement($_POST['id']);
}

if (isset($_POST["nom_event"]) && isset($_POST["adresse"]) && isset($_POST["temps"]) && isset($_POST["type"])) {
    if (
        !empty($_POST['nom_event']) &&
        !empty($_POST["adresse"]) &&
        !empty($_POST["temps"])&&
        !empty($_POST["type"])
       // !empty($_POST["id_event"])
       


    ) {
        foreach ($_POST as $key => $value) {
            echo "Key: $key, Value: $value<br>";
        }
        $evenement = new Evenement(
            null,
            $_POST['nom_event'],
            $_POST['adresse'],
            $_POST['temps'],
            $_POST['type']
     
           
        );
        var_dump($evenement);

        $EvenementC->updateEvenement($evenement, $_POST['id']);

        header('Location: listEvenement.php');
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
    <button><a href="listEvenements.php">Back to list</a></button>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <?php
    if (isset($_POST['id'])) {
    ?>

        <form action="" method="POST"> <!-- Corrected form action -->
            <table>
                <tr>
                    <td><label for="id">id:</label></td>
                    <td>
                        <input type="text" id="id" name="id" value="<?php echo $_POST['id'] ?>" readonly />
                        <span id="erreurNom_event" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="nom_event">Nom_event :</label></td>
                    <td>
                        <input type="text" id="nom_event" name="nom_event" value="<?php echo $evenement['nom_event'] ?>" />
                        <span id="erreurNom_event" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="adresse">adresse :</label></td>
                    <td>
                        <input type="text" id="adresse" name="adresse" value="<?php echo $evenement['adresse'] ?>" />
                        <span id="erreurtypt" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="temps">temps :</label></td>
                    <td>
                        <input type="text" id="temps" name="temps" value="<?php echo $evenement['temps'] ?>" />
                        <span id="erreurtemps" style="color: red"></span>
                    </td>
                </tr>
                <tr>
               
                    <td><label for="type">type :</label></td>
                    <td>
                        <input type="text" id="type" name="type" value="<?php echo $evenement['type'] ?>" />
                        <span id="erreurtemps" style="color: red"></span>
                    </td>
    </tr>
  


               
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
