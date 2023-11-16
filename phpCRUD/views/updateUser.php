<?php
include '../controller/UserC.php';
include '../model/User.php';
$error = "";

// Create an instance of the UserC controller
$UserC = new UserC();

if (isset($_POST['idUser'])) {
    $user = $UserC->showUser($_POST['idUser']);
    
    if ($user) {
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
                // Update user object properties
                $user->setNom($_POST['nom']);
                $user->setPrenom($_POST['prenom']);
                $user->setEmail($_POST['email']);
                $user->setTel($_POST['tel']);
                $user->setTypes($_POST['types']);
                
                // Call the updateUser method in UserC
                $UserC->updateUser($user, $_POST['idUser']);
                
                // Redirect to the list after successful update
                header('Location: listUsers.php');
                exit();
            } else {
                $error = "Missing information";
            }
        }
    } else {
        $error = "User not found";
    }
}
?>
<!-- Rest of your HTML -->
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Display</title>
</head>

<body>
<?php include 'header.php'; ?>
    <div class="container mt-200">
    <button><a href="listUsers.php">Back to list</a></button>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <?php
    if (isset($_POST['idUser'])) {
        $user = $UserC->showUser($_POST['idUser']);
        

        if ($user) {
            // Populate variables with user data for form display
            $nom = $user->getNom();
            $prenom = $user->getPrenom();
            $email = $user->getEmail();
            $tel = $user->getTel();
            $types = $user->getTypes();
       /* if ($user) {
            // Populate variables with user data for form display
            $nom = $user['nom'];
            $prenom = $user['prenom'];
            $email = $user['email'];
            $tel = $user['tel'];
            $types = $user['types']; */


    ?>

            <form action="" method="POST">
                <table>
                    <tr>
                        <td><label for="nom">Nom :</label></td>
                        <td>
                            <input type="text" id="nom" name="nom" value="<?php echo $nom; ?>" />
                            <span id="erreurNom" style="color: red"></span>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="prenom">Prenom :</label></td>
                        <td>
                            <input type="text" id="prenom" name="prenom" value="<?php echo $prenom; ?>" />
                            <span id="erreurPrenom" style="color: red"></span>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="email">Email :</label></td>
                        <td>
                            <input type="text" id="email" name="email" value="<?php echo $email; ?>" />
                            <span id="erreurEmail" style="color: red"></span>
                        </td>
                    </tr>

                    <tr>
                        <td><label for="tel">Tel :</label></td>
                        <td>
                            <input type="text" id="tel" name="tel" value="<?php echo $tel; ?>" />
                            <span id="erreurTel" style="color: red"></span>
                        </td>
                    </tr>

                    <tr>
                        <td><label for="types">Types :</label></td>
                        <td>
                            <input type="text" id="types" name="types" value="<?php echo $types; ?>" />
                            <span id="erreurTypes" style="color: red"></span>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <input type="hidden" name="idUser" value="<?php echo $_POST['idUser']; ?>">
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
    }
    ?>
    <?php include 'footer.php'; ?>
</body>

</html>
