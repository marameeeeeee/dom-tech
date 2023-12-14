<?php
require_once "../controller/EvenementdateC.php";
$evenementC = new event_typeC () ;
// Traitement du formulaire
if ($_SERVER ["REQUEST_METHOD"] == "POST") {
if (isset ($_POST['temps']) && isset ($_POST['search'])) {
    $temps= $_POST['temps'];
    $list = $evenementC->afficheevents($temps);
}
}

$fedy=$evenementC->afficheEvenementtypes();
?>
<!DOCTYPE html>
<head>
<title>Recherche evenement par date</title> 
<style>
        /* Ajout du style CSS */
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        header {
    background-color: #333;
    color: #fff;
    padding: 10px;
    text-align: center;
    margin-top: 130px;
}

        main {
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        form {
            margin-top: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        label {
            margin-bottom: 10px;
        }

        input[type="date"], input[type="submit"] {
            padding: 8px 15px;
            margin-bottom: 10px;
        }

        input[type="submit"] {
            background-color: #007BFF;
            color: #fff;
            border: none;
            cursor: pointer;
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
    <h1>Recherche evenement a travers sa date</h1>
    <form action="" method="POST">
        <label for="temps">Sélectionner une date :</label>
        
        <input type="date" name="temps" id="temps">
        <input type="submit" value="Rechercher" name="search">
    </form>
    <?php if (isset($list)) { ?>
        
       <br>
       <h2>Evenements correspondants a cette date :</h2>
       <ul>
        <?php foreach ($list as $ss) { ?>
            <li><?= $ss['nom_event'] ?> </li>
            <?php } ?>
        </ul>
        <?php } ?>
        <?php include 'footer.php'; ?>
    </body>
</html>
