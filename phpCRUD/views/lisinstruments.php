<?php
include "../controller/instrumentsC.php";

$c = new insC();
$tab = $c->listinstruments();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste d'instruments</title>
    <!-- Add your CSS styles here -->
    <style>
 body {
  background-color: #f0f8ff; /* Set a light blue background color */
}
.container {
  margin-top: 150px;
}
h1 {
  color: #ffffff !important; /* Set title color to a pink color */
  text-align: center;
}
h2 a {
  color: #4169e1; /* Set link color to a royal blue color */
}
table {
  border-collapse: collapse;
  width: 100%;
  margin-top: 20px;
}
th, td {
  border: 1px solid #dcdcdc; /* Set border color to a light gray color */
  padding: 8px;
  text-align: left;
}
th {
  background-color: #4169e1;
  color: #ffffff;
}
td {
  background-color: #ffffff;
}
form {
  display: inline;
}
input[type="submit"] {
  background-color: #ff1493; /* Set button color to a pink color */
  color: #ffffff;
  padding: 5px 10px;
  border: none;
  cursor: pointer;
}
    </style>
 
</head>
<body>
    
    <div class="container">
        <h1>Liste des instruments</h1>
        <h2>
            <a href="addinstruments.php">Ajouter un instrument</a>
            <a style="color:#ff1493; margin-left:300px;"href="statistiques.php">Statistiques</a>
           
        </h2>
        <table>
            <tr>
                <th>Id ins</th>
                <th>nom</th>
                <th>type</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
            <?php foreach ($tab as $joueur) { ?>
                <tr>
                    <td><?= $joueur['id_in']; ?></td>
                    <td><?= $joueur['nom']; ?></td>
                    <td><?= $joueur['tp']; ?></td>
                    <td>
                        <?php
                        // Vérifiez si le chemin d'accès à l'image existe
                        if (!empty($joueur['piece_jointe'])) {
                            echo '<img src="' . $joueur['piece_jointe'] . '" alt="Image" style="max-width: 100px; max-height: 100px;" />';
                        } else {
                            echo 'Aucune image';
                        }
                        ?>
                    </td>
                    <td>
                        <form method="POST" action="updateinstruments.php">
                            <input type="hidden" name="id_in" value="<?= $joueur['id_in']; ?>">
                            <input type="submit" name="update" value="Update">
                        </form>
                        <form method="POST" action="deleteinstruments.php">
                            <input type="hidden" name="id_in" value="<?= $joueur['id_in']; ?>">
                            <input type="submit" name="delete" value="Delete">
                        </form>
                    </td>
                </tr>
            <?php } ?>
        </table>
        
    </div>
    <a href="indexad.php">Retourner au Profil</a>
    <?php include 'footer.php'; ?>
</body>
</html>

    
    
