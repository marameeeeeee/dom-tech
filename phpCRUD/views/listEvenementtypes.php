<?php
include "../controller/EvenementtypeC.php";

$c = new EvenementtypeC();
$tab = $c->listEvenementtypes();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Types des evenements</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f6f6f6;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            text-align: center;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1, h2 {
            color: #3498db;
        }

        h2 a {
            text-decoration: none;
            color: #2ecc71;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 12px;
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

        input[type="submit"] {
            background-color: #e74c3c;
            color: #fff;
            padding: 8px 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #c0392b;
        }

        img {
            max-width: 100px;
            max-height: 100px;
        }
        .return-btn {
            display: inline-block;
            padding: 8px 16px;
            background-color: #333;
            color: #fff;
            text-decoration: none;
            border: none;
            border-radius: 4px;
        }

        .return-btn:hover {
            background-color: #555;
        }
    </style>
</head>
<body>

   
    <div class="container">
        <h1>Liste des evenements</h1>
        <h2>
            <a href="addEvenementtype.php">Add event</a>
        </h2>
        <table border="1">
            <tr>
                <th>Id event</th>
                <th>Nom</th>
                <th>Type_event</th>
                <th>Description</th>
                <th>Image</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>

            <?php foreach ($tab as $evenementtype) { ?>
                <tr>
                    <td><?= $evenementtype['id_event']; ?></td>
                    <td><?= $evenementtype['nom']; ?></td>
                    <td><?= $evenementtype['type_event']; ?></td>
                    <td><?= $evenementtype['description']; ?></td>
                    <td>
                        <?php if (!empty($evenementtype['image_path'])) {
                            echo '<img src="' . $evenementtype['image_path'] . '" alt="Event Image">';
                        } else {
                            echo 'No Image';
                        } ?>
                    </td>
                    <td align="center">
                        <form method="POST" action="updateEvenementtype.php">
                            <input type="hidden" name="id_event" value="<?= $evenementtype['id_event']; ?>">
                            <input type="submit" name="update" value="Update">
                        </form>
                    </td>
                    <td>
                        <form method="POST" action="deleteEvenementtyper.php">
                            <input type="hidden" name="id_event" value="<?= $evenementtype['id_event']; ?>">
                            <input type="submit" name="delete" value="Delete">
                        </form>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </div>
    
    <a href="indexad.php" class="return-btn">Back to Profile</a>
    <?php include 'footer.php'; ?>
</body>
</html>
