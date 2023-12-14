<?php
$error = '';

require '../Controller/AbonnementC.php';
require '../model/Abonnement.php';


$abonnement = null;
$AbonnementC = new AbonnementC();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_user = $_POST['id_user'] ?? '';
    $types = $_POST['types'] ?? '';
    $date_deb = $_POST['date_deb'] ?? '';
    $date_fin = $_POST['date_fin'] ?? '';
    $status = $_POST['status'] ?? '';
    $payed = $_POST['payed'] ?? '';

    if (!empty($id_user)) {
        $abonnement = new Abonnement(
            null,
            (int)$id_user,
            (int)$types,
            $date_deb,
            $date_fin,
            $status,
            (int)$payed
        );

        $AbonnementC->addAbonnement($abonnement);
        header('Location: ListAbonnement.php');
        exit();
    } else {
        $error = "Validation failed. Please check your input.";
    }
}
?>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Abonnement</title>
    <script src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
<script>
    function googleTranslateElementInit() {
        new google.translate.TranslateElement(
            { pageLanguage: 'en', autoDisplay: false },
            'google_translate_element'
        );
    }
</script>
    <script>
        function validateForm() {
            var id_user = document.getElementById('id_user').value;
            var types = document.getElementById('types').value;
            var date_deb = document.getElementById('date_deb').value;
            var date_fin = document.getElementById('date_fin').value;
            var status = document.getElementById('status').value;
            var payed = document.getElementById('payed').value;
        } 

    </script>
</head>

<body>
<?php include 'header.php'; ?>
<div class="container mt-200">
    <a href="ListAbonnement.php"> Back to list </a>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <form action="" method="POST">
        <table>
            <tr>
            <td><label for="id_user"> USER:</label></td>
            <td>
        <select id="id_user" name="id_user" class="form-control">
            <option value="1">badiss</option>
            <option value="2">amen</option>
            <option value="3">fedy</option>
            <option value="4">wala</option>
            <option value="5">nour</option>
            <option value="6">maram</option>
        </select>
        <span id="erreurtypes" style="color: red"></span>
    </td>
            </tr>
            <tr>
            <td><label for="types"> Types:</label></td>
            <td>
        <select id="types" name="types" class="form-control">
            <option value="16">Gratuit</option>
            <option value="17">Premium</option>
            <option value="18">Normal</option>
        </select>
        <span id="erreurtypes" style="color: red"></span>
    </td>

            </tr>
            <tr>
                <td><label for="date_deb"> Date Debut :</label></td>
                <td>
                    <input type="date" id="date_deb" name="date_deb" />
                    <span id="erreurDate_deb" style="color: red"></span>
                </td>
            </tr>
            <tr>
                <td><label for="date_fin"> Date Fin :</label></td>
                <td>
                    <input type="date" id="date_fin" name="date_fin" />
                    <span id="erreurDate_fin" style="color: red"></span>
                </td>
            </tr>
            <tr>
                <td><label for="status"> Status :</label></td>
                <td><select id="status" name="status">
            <option value="Active">Active</option>
            <option value="Inactive">Inactive</option>
            <option value="Expirée">Expirée</option>
            <option value="En Attente">En Attente</option>
            
        </select>
        </td>
            </tr>
            <tr>
                <td><label for="payed"> Payed :</label></td>
                <td>
                    <input type="text" id="payed" name="payed" />
                    <span id="erreurPayed" style="color: red"></span>
                </td>
                <script src="inputcontrol2.js" defer></script>
            </tr>

            <td>
                <input type="submit" value="Save">
            </td>
            <td>
                <input type="reset" value="Reset">
            </td>
        </table>

        <div id="google_translate_element"></div>

    </form>
    </div>
    <?php include 'footer.php'; ?>
    
</body>

</html>