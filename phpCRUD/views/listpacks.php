<?php
include "../controller/PacksC.php";

$c = new PackC();
$tab = $c->listPacks();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des types d'instruments</title>
    <!-- Add your CSS styles here -->
    <style>
        body {
            background-color: #f8f9fa; /* Set a light background color */
        }
        .container {
            margin-top: 150px; /* Increased margin-top for moving components lower */
        }
        h1 {
            color: #28a745; /* Set title color to a success color */
            text-align: center;
        }
        h2 a {
            color: #007bff; /* Set link color to a primary color */
        }
        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px; /* Add some space between title and table */
        }
        th, td {
            border: 1px solid #dee2e6;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #007bff;
            color: #ffffff;
        }
        td {
            background-color: #ffffff;
        }
        form {
            display: inline; /* Display form elements inline */
        }
        input[type="submit"] {
            background-color: #28a745; /* Set button color to a success color */
            color: #ffffff;
            padding: 5px 10px;
            border: none;
            cursor: pointer;
        }
    </style>
</head>
<body>
    
    <?php include 'header.php'; ?>
    <div class="container">
        <h1>Liste des packs</h1>
        <h2>
            <a href="addpack.php">Ajouter un pack</a>
        </h2>
<table border="1" align="center" width="70%">
    <tr>
        <th>Id Pack</th>
        <th>Name</th>
        <th>Price</th>
        <th>Types</th>
        <th>Duration</th>
        <th>Update</th>
        <th>Delete</th>
    </tr>


    <?php
    foreach ($tab as $pack) {
    ?>




        <tr>
            <td><?= $pack['idpack']; ?></td>
            <td><?= $pack['nom']; ?></td>
            <td><?= $pack['price']; ?></td>
            <td><?= $pack['types']; ?></td>
            <td><?= $pack['duration']; ?></td>
            <td align="center">
                <form method="POST" action="updatepack.php">
                    <input type="submit" name="update" value="Update">
                    <input type="hidden" value=<?PHP echo $pack['idpack']; ?> name="idpack">
                </form>
            </td>
            <td>
                <a href="deletepack.php?id=<?php echo $pack['idpack']; ?>">Delete</a>
            </td>
        </tr>
    <?php
    }
    ?>
</table>
</div>
    <?php include 'footer.php'; ?>
</body>
</html>