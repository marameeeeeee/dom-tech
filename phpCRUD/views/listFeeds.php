<?php
include "../controller/feedbackC.php";

$c = new feedC();
$tab = $c->listFeeds();
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Avis</title>

    <style>
    table {
        border-collapse: collapse;
        width: 70%;
        margin: 0 auto;
        margin-left: 4cm;
    }

    th, td {
        border: 1px solid #fff; /* Ajout de bordures blanches */
        padding: 8px;
        text-align: left;
        color: #fff;
        background-color: #000;
    }

    th {
        background-color: #000;
        color: #fff;
        border: 1px solid #fff; /* Ajout de bordures blanches pour les titres */
    }

    tr:nth-child(even) {
        background-color: #222;
    }

    tr:hover {
        background-color: #333;
    }

    .action-button {
        padding: 6px 12px;
        cursor: pointer;
        border: 1px solid #fff; /* Ajout de bordures blanches */
        color: #fff;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 14px;
        transition-duration: 0.4s;
        margin: 2px 2px;
    }

    .update {
        background-color: #4CAF50;
    }

    .delete {
        background-color: #f44336;
    }

    .blue-border {
        border: 2px solid #3498db;
        padding: 8px;
        color: #fff;
        background-color: #000;
    }
</style>



</head>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css"> 
    <title>Liste des Rendez-Vous</title>
    <style>
        body {
            text-align: center;
        }

        h1 {
            color: #333;
        }

        h2 a {
            color: #007bff;
            text-decoration: none;
        }

        h2 a:hover {
            text-decoration: underline;
        }

        table {
            margin: auto; /* Center the table */
            border-collapse: collapse;
            width: 70%;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
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
        }

        .update {
            background-color: #4CAF50; /* Green */
            color: white;
            border: none;
        }

        .delete {
            background-color: #f44336; /* Red */
            color: white;
            border: none;
        }
    </style>
</head>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css"> 
    <title>Liste des Avis </title>
    <style>
        body {
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
            border: 1px solid #ddd;
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
        }

        .update {
            background-color: #4CAF50; /* Green */
            color: white;
            border: none;
        }

        .delete {
            background-color: #f44336; /* Red */
            color: white;
            border: none;
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
    </style>
</head>
<body>
<?php include 'header.php'; ?>

<h1>Liste des Avis</h1>

<table border="1">
    <tr>
        <th class="blue-border">id_fb</th>
        <th class="blue-border">commentaire</th>
        <th class="blue-border">email</th>
        <th class="blue-border">Actions</th>
    </tr>

    <?php
    // Ajout de la condition pour récupérer les avis spécifiques au rendez-vous
    if (isset($_GET['id_rv'])) {
        $id_rv = $_GET['id_rv'];
        $tab = $c->listFeedsForRdv($id_rv);
    } else {
        $tab = $c->listFeeds();
    }

    foreach ($tab as $feed) {
    ?>
    <tr>
        <td><?= $feed['id_fb']; ?></td>
        <td><?= $feed['commentaire']; ?></td>
        <td><?= $feed['email']; ?></td>
        <td>
            <form method="POST" action="updateFeed.html">
                <input type="submit" name="update" class="action-button update" value="Update">
                <input type="hidden" value="<?= $feed['id_fb']; ?>" name="id_fb">
            </form>
        </td>
        <td>
            <a class="action-button delete" href="deleteFeed.php?id_fb=<?= $feed['id_fb']; ?>">Delete</a>
        </td>
    </tr>
    <?php
    }
    ?>
</table>

<div class="add-player">
    <h2>
        <a href="addFeed.php" class="action-button">Ajouter un avis </a>
    </h2>
</div>

<?php include 'footer.php'; ?>


</body>
</html>



</html>
