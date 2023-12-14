<?php
require_once "../controller/AbonnementC.php";
$typessC = new GenreC();
$users=$typessC->afficheusers();
//TRAITEMENT
if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST['types']) && isset($_POST['search'])){
        $id_type=$_POST['types'];
        $list=$typessC->afficheabonnements($id_type);

    }
}
$typ=$typessC->affichepacks();


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recherche d'instruments par type</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #007BFF;
            padding: 10px;
            color: #fff;
            text-align: center;
        }

        .container {
            margin-top: 100px;
        }

        h1 {
            color: #007BFF; /* Color for the main heading */
        }

        form {
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
        }

        select, input {
            padding: 8px;
            margin: 5px;
        }

        input[type="submit"] {
            background-color: #007BFF;
            color: #fff;
            cursor: pointer;
        }

        h2 {
            color: #007BFF; /* Color for the secondary heading */
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        li {
            margin-bottom: 5px;
            color: #fff; /* Color for the list item - white */
        }
    </style>
</head>
<body>

<?php include 'header.php'; ?>

<div class="container">
    <h1 style="color: #347;"> Recherche par type :</h1>
    <form action="" method="POST">
        <label for="types" style="font-size: 10spx;">Sélectionnez un type:</label>
        <select name="types" id="types">
            <?php
            foreach ($typ as $typex){
                echo '<option value="' . $typex['id_pack'] . '">' .$typex['types'] . '</option>';
            }
            ?>
        </select>
        <input type="submit" value="Rechercher" name="search">
    </form>

    <span>
    <?php if (isset($list) && isset($users)): ?>
        
            <h2 style="color: #EE;" style="text-align: center; font-size: 2.2em;">Abonnements correspondants au type sélectionné:</h2>
            <ul style="list-style: none; padding: 0;">
    <?php foreach ($list as $tt): ?>
        <li style="margin-bottom: 15px; border: 1px solid #e0e0e0; padding: 10px; border-radius: 5px;">
            <?php foreach ($users as $user): ?>
                <?php if ($user['id_user'] === $tt['id_user']): ?>
                    <div style="display: flex; align-items: center;">
                        <div style="flex: 1; color: #ffffff; font-size: 20px;">
                            <?= $user['nom'] ?>
                        </div>
                        <div style="margin-left: 10px;">
                            <span>Status: <?= $tt['status'] ?></span><br>
                            <span>Date Debut: <?= $tt['date_deb'] ?></span><br>
                            <span>Date Fin: <?= $tt['date_fin'] ?></span>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </li>
    <?php endforeach; ?>
</ul>

        <?php endif; ?>
</div>
</body>
</html>