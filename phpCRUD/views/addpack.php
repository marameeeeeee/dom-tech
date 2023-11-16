<?php
$error = '';

require '../Controller/PacksC.php';
require '../model/Packs.php';

$pack = null;
$PackC = new PackC();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST['nom'] ?? '';
    $price = $_POST['price'] ?? '';
    $types = $_POST['types'] ?? '';
    $duration = $_POST['duration'] ?? '';

    if (
        !empty($nom) 
    ) {
        $pack = new pack(
            null,
            $nom,
            (int)$price,
            $types,
            $duration
        );

        $PackC->addPack($pack);
        header('Location: listpacks.php');
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
    <title>Pack</title>
    <script>
        function validateForm() {
            var nom = document.getElementById('nom').value;
            var price = document.getElementById('price').value;
            var types = document.getElementById('types').value;
            var duration = document.getElementById('duration').value;

            // Validate Name field (letters only)
            var nameRegex = /^[a-zA-Z\s]+$/;
            if (!nameRegex.test(nom)) {
                alert("Name should contain only letters and spaces.");
                return false;
            }

            // Validate Price field (numeric and positive)
            if (isNaN(price) || price <= 0) {
                alert("Price should be a positive number.");
                return false;
            }

            // Validate Types field (letters only)
            if (!nameRegex.test(types)) {
                alert("Types should contain only letters.");
                return false;
            }

            // Validate Duration field (letters only)
            if (!nameRegex.test(duration)) {
                alert("Duration should contain only letters.");
                return false;
            }

            return true; // Form is valid, submit the data
        }
    </script>
</head>

<body>
<?php include 'header.php'; ?>
<div class="container mt-200">
    <a href="listpacks.php">Back to list </a>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <form action="" method="POST">
        <table>
            <tr>
                <td><label for="nom">Name :</label></td>
                <td>
                    <input type="text" id="nom" name="nom" />
                    <span id="erreurNom" style="color: red"></span>
                </td>
            </tr>
            <tr>
                <td><label for="price"> Price :</label></td>
                <td>
                    <input type="text" id="price" name="price" />
                    <span id="erreurPrice" style="color: red"></span>
                </td>
            </tr>
            <tr>
                <td><label for="types"> Types :</label></td>
                <td>
                    <input type="text" id="types" name="types" />
                    <span id="erreurTypes" style="color: red"></span>
                </td>
            </tr>
            <tr>
                <td><label for="duration"> Duration :</label></td>
                <td>
                    <input type="text" id="duration" name="duration" />
                    <span id="erreurduration" style="color: red"></span>
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
    </div>
    <?php include 'footer.php'; ?>
</body>

</html>