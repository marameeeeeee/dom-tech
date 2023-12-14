<?php
include "../controller/RdvC.php";

$c = new RdvC();
$tab = $c->listRdvs();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css"> <!-- Link to your CSS file -->
    <title>List of Appointments</title>
    <style>
        /* Add your CSS styles here */
        body {
            font-family: Arial, sans-serif;
            background-color: #f6f6f6;
            color: #333;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            text-align: center;
        }

        h1 {
            color: #333;
        }

        table {
            margin: auto; /* Center the table */
            border-collapse: collapse;
            width: 70%;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: center;
        }

        .blue-border {
            border: 2px solid #007bff;
            padding: 10px;
            background-color: #f2f2f2;
            color: #333;
        }

        .action-button {
            padding: 6px 12px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 14px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 4px;
            color: #fff;
        }

        .update {
            background-color: #4CAF50; /* Green */
        }

        .delete {
            background-color: #f44336; /* Red */
        }

        .add-player {
            margin-top: 20px;
        }

        .add-player a {
            color: #007bff;
            text-decoration: none;
        }

        .add-player a:hover {
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
    <h1>List of Appointments</h1>

    <table border="1">
        <tr>
            <th class="blue-border">Appointment ID</th>
            <th class="blue-border">Date</th>
            <th class="blue-border">Location</th>
            <th class="blue-border">Status</th>
            <th class="blue-border">Actions</th>
        </tr>

        <?php
        foreach ($tab as $rendez_vous) {
            ?>
            <tr>
                <td><?= $rendez_vous['id_rv']; ?></td>
                <td><?= $rendez_vous['date']; ?></td>
                <td><?= $rendez_vous['lieu']; ?></td>
                <td><?= $rendez_vous['etat']; ?></td>
                <td>
                    <?php
                    if ($rendez_vous['lieu'] == 'presentiel') {
                        echo '<a href="carte.html?id_rv=' . $rendez_vous['id_rv'] . '" class="action-button" style="background-color: #800080;">View Map</a>';
                    }
                    ?>
                    <form method="POST" action="updateRdv.html">
                        <input type="submit" name="update" class="action-button update" value="Update">
                        <input type="hidden" value="<?= $rendez_vous['id_rv']; ?>" name="id_rv">
                    </form>
                    <a class="action-button delete" href="deleteRdv.php?id_rv=<?= $rendez_vous['id_rv']; ?>" style="background-color: #f44336;">Delete</a>
                    <a href="listFeeds.php?id_rv=<?= $rendez_vous['id_rv']; ?>" class="action-button" style="background-color: #007bff;">View Reviews</a>
                </td>
            </tr>
            <?php
        }
        ?>
    </table>

    <div class="add-player">
       
    </div>
    <a href="indexad.php" class="return-btn">Back to Profile</a>
    <?php include 'footer.php'; ?>
</body>
</html>
