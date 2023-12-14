<?php
include "../controller/AvisC.php";
$coursc = new courstype () ;
// Traitement du formulaire
if ($_SERVER ["REQUEST_METHOD"] == "POST") {
if (isset ($_POST['avis']) && isset ($_POST['search'])) {
    $id = $_POST['avis'];
    $list = $coursc->afficheCours($id);
}
}

$x=$coursc->afficheCourstype();
?>
<!DOCTYPE html>
<head>
<title>Recherche cours</title> 
<style>
        /* Ajout du style CSS */
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #333;
            color: #fff;
            padding: 10px;
            text-align: center;
        }

        form {
            margin-top: 20px;
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        li {
            margin-bottom: 10px;
        }

        footer {
            background-color: #333;
            color: #fff;
            padding: 10px;
            text-align: center;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>


<body> 

<?php include 'header.php'; ?>
    <h1>Recherche cours a travers son type</h1>
    <form action="" method="POST">
        <label for="id_user">Sélectionner un type :</label>
        <select name="id" id="id">
        <?php
        foreach ($x as $tx) {
            echo '<option value="' . $tx['id_user'] . '">' .$tx['nom_de_cours'] . '</option>';
        }
        ?>
        </select>
        <input type="submit" value="Rechercher" name="search">
    </form>
    <?php if (isset($list)) { ?>
        
       <br>
       <h2>avis correspondants au type sélectionné :</h2>
       <ul>
        <?php foreach ($list as $ss) { ?>
            <li><?= $ss['nom_de_cours'] ?> </li>
            <?php } ?>
        </ul>
        <?php } ?>
        <?php include 'footer.php'; ?>
    </body>
</html>

