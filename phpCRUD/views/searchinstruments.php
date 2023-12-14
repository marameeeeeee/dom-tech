<?php
require_once "../controller/typesC.php";
$typessC= new GenreC();
//TRAITEMENT
if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST['tp']) && isset($_POST['search'])){
        $id_type=$_POST['tp'];
        $list=$typessC->afficheinstruments($id_type);

    }
}
$typ=$typessC->affichetypes();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recherche d'instrus par type</title>
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
    <h1 style="color:#ff1493;">Recherche par type :</h1>
   

    <form action="" method="POST">
        <label for="tp" style="font-size: 24px;">Sélectionnez un type:</label>
        <select name="tp" id="tp">
            <?php
            foreach ($typ as $typex){
                echo '<option value="' . $typex['id_type'] . '">' .$typex['titre'] . '</option>';
            }
            ?>
        </select>
        <input type="submit" value="Rechercher" name="search">
    </form>
    
    <?php if(isset($list)) { ?>
        <h2 style="color: #1C73E2;">Instruments correspondants au type sélectionné :</h2>
        <ul>
                <?php foreach ($list as $tt) { ?>
                    <li style="color: #ff1493; font-size: 25px;">
                    <?= $tt['nom'] ?> :
                        <?php
                        
                        // Afficher l'image si le chemin est défini
                        if (!empty($tt['piece_jointe'])) {
                            echo '<img src="' . $tt['piece_jointe'] . '" alt="Instrument Image" style="max-width: 100px; max-height: 100px;" />';
                        } else {
                            echo 'Aucune image';
                        }
                        ?>
                         
                    </li>
                <?php } ?>
            </ul>
    <?php } ?>

    <br>
    <a href="recherche_instruments.php" style="font-size: 18px; color: #007BFF;">Voir tous les instruments</a>
</div>
</body>
</html>
