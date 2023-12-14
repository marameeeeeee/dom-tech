<?php
include "../controller/typesC.php";

$c = new typeC();
$tab = $c->listtypes();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List of Instrument Types</title>
    <style>
        /* Styles CSS */
        body {
            font-family: Arial, sans-serif;
            background-color: #f6f6f6;
            color: #333;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .container {
            margin-top: 50px;
            width: 80%;
            margin: 0 auto;
            padding: 20px;
        }

        h1 {
            color: #333;
            text-align: left;
            margin-bottom: 20px;
        }

        h2 a {
            color: blue;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
            color: #333;
        }

        td {
            background-color: #fff;
        }

        form {
            display: inline;
        }

        .btn {
            background-color: blue;
            color: #fff;
            padding: 5px 10px;
            border: none;
            cursor: pointer;
        }

        .btn-update {
            background-color: #4169e1;
        }

        .btn-delete {
            background-color: red;
        }

        a.return-link {
            display: block;
            margin-top: 20px;
            color: blue;
            text-decoration: none;
        }

        a.return-link:hover {
            text-decoration: underline;
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
        <h1>List of Instrument Types</h1>
        <h2><a href="addtypes.php">Add an Instrument Type</a></h2>
        <table>
            <tr>
                <th>Id type</th>
                <th>Title</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
            <?php foreach ($tab as $joueur) : ?>
                <tr>
                    <td><?= $joueur['id_type']; ?></td>
                    <td><?= $joueur['titre']; ?></td>
                    <td><?= $joueur['descriptions']; ?></td>
                    <td>
                        <form method="POST" action="updatetypes.php">
                            <input type="hidden" name="id_type" value="<?= $joueur['id_type']; ?>">
                            <input class="btn btn-update" type="submit" name="update" value="Update">
                        </form>
                        <form method="POST" action="deletetypes.php">
                            <input type="hidden" name="id_type" value="<?= $joueur['id_type']; ?>">
                            <input class="btn btn-delete" type="submit" name="delete" value="Delete">
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>

    <a href="indexad.php" class="return-btn">Back to Profile</a>
    <?php include 'footer.php'; ?>
</body>
</html>
