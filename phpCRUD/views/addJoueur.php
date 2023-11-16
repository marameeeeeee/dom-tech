<?php

include '../Controller/JoueurC.php';
include '../model/Joueur.php';
$error = "";

// create client
$joueur = null;

// create an instance of the controller
$joueurC = new JoueurC();
if (
    isset($_POST["nom"]) &&
    isset($_POST["type"]) &&
    isset($_POST["description"]) 
   
) {
    if (
        !empty($_POST['nom']) &&
        !empty($_POST["type"]) &&
        !empty($_POST["description"])
       
    ) {
        $joueur = new Joueur(
            null,
            $_POST['nom'],
            $_POST['type'],
            $_POST['description'],
           
        );
        $joueurC->addJoueur($joueur);
        header('Location:listJoueurs.php');
    } else
        $error = "Missing information";
}


?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Joueur </title>
</head>

<body>
<?php include 'header.php'; ?>
    <div class="container mt-200">
    <a href="listJoueurs.php">Back to list </a>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <form action="" method="POST">
        <table>
            <tr>
                <td><label for="nom">Nom :</label></td>
                <td>
                    <input type="text" id="nom" name="nom" />
                    <span id="erreurNom" style="color: red"></span>
                </td>
            </tr>
            <tr>
                <td><label for="type">Type :</label></td>
                <td>
                    <input type="text" id="type" name="type" />
                    <span id="erreurPrenom" style="color: red"></span>
                </td>
            </tr>
            <tr>
                <td><label for="description">Description :</label></td>
                <td>
                    <input type="text" id="description" name="description" />
                    <span id="erreurEmail" style="color: red"></span>
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