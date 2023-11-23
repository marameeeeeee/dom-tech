<?php

include '../Controller/UserC.php';
include '../model/User.php';

$error = "";

// create client
$user = null;

// create an instance of the controller
$userC = new UserC();
if (
    isset($_POST["nom"]) &&
    isset($_POST["prenom"]) &&
    isset($_POST["email"]) &&
    isset($_POST["tel"]) &&
    isset($_POST["types"]) 
   
) {
    if (
        !empty($_POST['nom']) &&
        !empty($_POST["prenom"]) &&
        !empty($_POST["email"]) &&
        !empty($_POST["tel"]) &&
        !empty($_POST["types"]) 
       
    ) {
        $user = new User(
            null,
            $_POST['nom'],
            $_POST['prenom'],
            $_POST['email'],
            $_POST['tel'],
            $_POST['types'],
           
        );
        $userC->addUser($user);
        header('Location:listUsers.php');
    } else
        $error = "Missing information";
}




?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Form Validation</title>
    <!-- Vos feuilles de style et autres scripts ici -->
    <style>
        /* Vos styles ici */
    </style>
</head>

<body>
    <?php include 'header.php'; ?>
    <div class="container mt-200">
        <a href="listUsers.php">Retour à la liste</a>
        <hr>
        <!-- Votre contenu HTML -->
        <div id="error">
            <?php echo $error; ?>
        </div>

        <form action="" method="POST" onsubmit="return validateForm()">
            <table>
                <tr>
                    <td><label for="nom">Nom :</label></td>
                    <td>
                        <input type="text" id="nom" name="nom" />
                        <span id="erreurNom" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="prenom">Prénom :</label></td>
                    <td>
                        <input type="text" id="prenom" name="prenom" />
                        <span id="erreurprenom" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="email">Email :</label></td>
                    <td>
                        <input type="text" id="email" name="email" />
                        <span id="erreurEmail" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="tel">Téléphone :</label></td>
                    <td>
                        <input type="text" id="tel" name="tel" />
                        <span id="erreurTel" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="types">Types :</label></td>
                    <td>
                        <input type="text" id="types" name="types" />
                        <span id="erreurtypes" style="color: red"></span>
                    </td>
                </tr>
            </table>
            <input type="submit" value="Enregistrer">
            <input type="reset" value="Réinitialiser">
        </form>
        <?php include 'footer.php'; ?>
    </div>

    <script type="text/javascript">
        function validateForm() {
            var nomValue = document.getElementById("nom").value;
            var typeValue = document.getElementById("types").value;
            var descriptionValue = document.getElementById("prenom").value;

            // Valider le nom : uniquement des lettres
            if (!/^[a-zA-Z]+$/.test(nomValue)) {
                document.getElementById("erreurNom").innerText = "Nom invalide : doit contenir uniquement des lettres";
                return false;
            } else {
                document.getElementById("erreurNom").innerText = "";
            }

            // Valider les types : uniquement des lettres
            if (!/^[a-zA-Z]+$/.test(typeValue)) {
                document.getElementById("erreurtypes").innerText = "Types invalides : doit contenir uniquement des lettres";
                return false;
            } else {
                document.getElementById("erreurtypes").innerText = "";
            }

            // Valider le prénom : uniquement des lettres
            if (!/^[a-zA-Z]+$/.test(descriptionValue)) {
                document.getElementById("erreurprenom").innerText = "Prénom invalide : doit contenir uniquement des lettres";
                return false;
            } else {
                document.getElementById("erreurprenom").innerText = "";
            }

            return true;
        }
    </script>
</body>

</html>
