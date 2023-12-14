<?php
include '../Controller/EvenementC.php';
include '../model/Evenement.php';

$error = "";
$errornom_event = "";
$erroradresse = "";
$errortemps = "";
$errortype = "";

//$errorid_event = "";



// create client
$Evenement = null;

// create an instance of the controller
$evenementC = new EvenementC();

if (
    isset($_POST["nom_event"]) &&
    isset($_POST["adresse"]) &&
    isset($_POST["temps"]) &&
    isset($_POST["type"]) 
    //isset($_POST["id_event"])
   
) {
    // Check for empty values using empty() function
    if (
        !empty($_POST['nom_event']) &&
        !empty($_POST["adresse"]) &&
        !empty($_POST["temps"]) &&
        !empty($_POST["type"]) 
       //!empty($_POST["id_event"])
        
       
    ) {
        $evenement = new Evenement(
            null,
            $_POST['nom_event'],
            $_POST['adresse'],
            $_POST['temps'],
            $_POST['type']
            //$_POST['id_event']
           
        );
        $evenementC->addEvenement($evenement);
        header('Location: listEvenement.php');
        exit(); // Add exit() after header to stop further execution
    } else {
        // If any field is empty, set the $error variable
        $error = "Missing information";
    }

    // Additional checks for individual fields
    if (empty($_POST['nom_event'])) {
        $errornom_event = "Remplir correct nom_event";
    }
    if (empty($_POST['adresse'])) {
        $erroradresse = "Remplir correct adresse";
    }
    if (empty($_POST['temps'])) {
        $errortemps = "Remplir correct temps";
    }
    if (empty($_POST['type'])) {
        $errortype_event = "Remplir correct type";
    }
   /* if (empty($_POST['typec'])) {
        $errortype = "Remplir correct type";
    }*/
   
   
}
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Evenement </title>
    <head>
    <!-- ... autres balises meta ... -->
    <title>Evenement </title>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            document.querySelector("form").addEventListener("submit", function (event) {
                // Réinitialiser les messages d'erreur
                document.getElementById("erreurnom_event").innerHTML = "";
                document.getElementById("erreuradresse").innerHTML = "";

                // Vérification du nom
                var nom_event = document.getElementById("nom_event").value;
                if (!/^[a-zA-Z]+$/.test(nom_event)) {
                    event.preventDefault();
                    document.getElementById("erreurnom_event").innerHTML = "Le nom doit contenir uniquement des lettres.";
                }

                // Vérification de l'adresse
                var adresse = document.getElementById("adresse").value;
                if (!/^[a-zA-Z]+$/.test(adresse)) {
                    event.preventDefault();
                    document.getElementById("erreuradresse").innerHTML = "L'adresse doit contenir uniquement des lettres.";
                }
                
            });
        });
    </script>
</head>

</head>

<body>
    <?php include 'header.php'; ?>
    <div class="container mt-200">
        <a href="listEvenement.php">Back to list </a>
        <hr>

        <div id="error">
            <?php echo $error; ?>
        </div>

        <form action="addEvenement.php" method="POST">
            <table>
                <tr>
                    <td><label for="nom_event">Nom_event:</label></td>
                    <td>
                        <input type="text" id="nom_event" name="nom_event" />
                        <span id="erreurnom_event" style="color: red"></span>

                        <div id="erreurnom_event">
                            <?php echo $errornom_event; ?>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td><label for="adresse">adresse :</label></td>
                    <td>
                        <input type="text" id="adresse" name="adresse" />
                        <span id="erreuradresse" style="color: red"></span>
                        <div id="erreuradresse">
                            <?php echo $erroradresse; ?>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td><label for="temps">temps :</label></td>
                    <td>
                        <input type="text" id="temps" name="temps" />
                        <span id="erreurtemps" style="color: red"></span>
                        <div id="erreurtemps">
                            <?php echo $errortemps; ?>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td><label for="type">type :</label></td>
                    <td>
                        <input type="text" id="type" name="type" />
                        <span id="erreurtype" style="color: red"></span>
                        <div id="erreurtype">
                            <?php echo $errortype; ?>
                        </div>
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
        <?php include 'footer.php'; ?>
    </div>
</body>

</html>
