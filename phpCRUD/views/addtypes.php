<?php
include '../Controller/typesC.php';
include '../model/type.php';
$error = "";

// create client
$joueur = null;

// create an instance of the controller
$joueurC = new typeC();
if (
    isset($_POST["titre"]) &&
    isset($_POST["descriptions"])  
   
) {
    if (
        !empty($_POST['titre']) &&
        !empty($_POST["descriptions"]) 
       
    ) {
        $joueur = new type(
            null,
            $_POST['titre'],
            $_POST['descriptions'],
           
        );
        $joueurC->addtypes($joueur);
        header('Location:listtypes.php');
    } else {
        $error = "Missing information";
    }
}
?>
<html lang="en">
<head>
    <!-- Your head content here -->
</head>
<body>
    <?php include 'header.php'; ?>
    <div class="container mt-200">
        <a href="listtypes.php">Back to list</a>
        <hr>
        <div id="error">
            <?php echo $error; ?>
        </div>
        <form action="" method="POST">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <table>
                        <tr>
                            <td><label for="titre">titre :</label></td>
                            <td>
                                <input type="text" id="titre" name="titre" class="form-control" />
                                <span id="erreurtitre" style="color: red"></span>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="descriptions">descriptions :</label></td>
                            <td>
                                <input type="text" id="descriptions" name="descriptions" class="form-control" />
                                <span id="erreurdescriptions" style="color: red"></span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="submit" value="Save" class="btn btn-primary" />
                            </td>
                            <td>
                                <input type="reset" value="Reset" class="btn btn-secondary" />
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </form>
    </div>
    <?php include 'footer.php'; ?>
    <script src="controle.js"></script>
</body>
</html>
