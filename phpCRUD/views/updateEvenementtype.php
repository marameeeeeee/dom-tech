<?php
include '../Controller/EvenementtypeC.php';
include '../model/Evenementtype.php';
$error = "";

// create client
$evenementtype = null;
// create an instance of the controller
$EvenementtypeC = new EvenementtypeC();

if (isset($_POST['id_event'])) {
    $evenementtype = $EvenementtypeC->showEvenementtype($_POST['id_event']);
}

if (isset($_POST["nom"]) && isset($_POST["type_event"]) && isset($_POST["description"])) {
    if (
        !empty($_POST['nom']) &&
        !empty($_POST["type_event"]) &&
        !empty($_POST["description"])
    ) {
        foreach ($_POST as $key => $value) {
            echo "Key: $key, Value: $value<br>";
        }
        $evenementtype = new Evenementtype(
            null,
            $_POST['nom'],
            $_POST['type_event'],
            $_POST['description']
        );
        var_dump($evenementtype);

        $EvenementtypeC->updateEvenementtype($evenementtype, $_POST['id_event']);

        header('Location: listEvenementtypes.php');
        exit(); // Make sure to exit after a header redirect
    } else {
        $error = "Missing information";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Display</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        center {
            text-align: center;
        }

        h1 {
            color: #333;
        }

        h2 a {
            color: #007bff;
            text-decoration: none;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        form {
            display: inline-block;
        }

        input[type="submit"],
        input[type="reset"] {
            background-color: #e74c3c; /* New button color */
            color: #fff;
            padding: 5px 10px;
            border: none;
            cursor: pointer;
        }

        input[type="submit"]:hover,
        input[type="reset"]:hover {
            background-color: #c0392b; /* New button color on hover */
        }
    </style>
</head>





<body>
<?php include 'header.php'; ?>
    <button><a href="listEvenementtypes.php">Back to list</a></button>
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
                        <input type="text" id="nom" name="nom" value="<?php echo $evenementtype['nom'] ?>" />
                        <span id="erreurNom" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="type_event">type :</label></td>
                    <td>
                        <input type="text" id="type_event" name="type_event" value="<?php echo $evenementtype['type_event'] ?>" />
                        <span id="erreurtypt" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="description">description :</label></td>
                    <td>
                        <input type="text" id="description" name="description" value="<?php echo $evenementtype['description'] ?>" />
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
