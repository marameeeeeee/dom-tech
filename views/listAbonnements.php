<?php
include "../controller/AbonnementC.php";

$c = new AbonnementC();
$tab = $c->listAbonnements();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Abonnements </title>
    <!-- Add your CSS styles here -->
    <style>
      body {
    background-color: #f0f0f0; /* Set a slightly lighter background color */
}

.container {
    margin-top: 120px; /* Adjusted margin-top for moving components slightly lower */
}

h1 {
    color: #FF5733; /* Set title color to a professional orange shade */
    text-align: center;
}


h2 a {
    
    color: #4B0082; /* Set link color to a professional indigo shade */
    
}

table {
    border-collapse: collapse;
    width: 100%;
    margin-top: 35px; /* Adjusted space between title and table */
}

th, td {
    border: 1px solid #dcdcdc; /* Slightly lighter border color for better contrast */
    padding: 8px; /* Increased padding for better spacing */
    text-align: left;
}

th {
    background-color: #4B0082; /* Set table header background color to a professional indigo shade */
    color: #ffffff;
}

td {
    background-color: #f5f5f5; /* Set table data cell background color to a slightly lighter shade */
}

form {
    display: block; /* Changed to display form elements as block for better alignment */
}

input[type="submit"] {
    background-color: #FF5733; /* Set button color to a professional orange shade */
    color: #ffffff;
    padding: 8px 12px; /* Adjusted padding for better button size */
    border: none;
    cursor: pointer;
}
    </style>
</head>
<body>
    
    <?php include 'header.php'; ?>
    <div class="container">
        <h1>Liste des Abonnements </h1>
        <h2>
            <a href="addAbonnement.php">Ajouter un Abonnement </a>
        </h2>
<table border="2.5" align="center" width="70%">
    <tr>
        <th> ID Abonnement </th>
        <th> Type abonnement </th>
        <th> Statut </th>
        <th> Nom Abonnement </th>
    </tr>


    <?php
    foreach ($tab as $abonnement) {
    ?>




        <tr>
            <td><?= $abonnement['id_ab']; ?></td>
            <td><?= $abonnement['types_pack']; ?></td>
            <td><?= $abonnement['statut']; ?></td>
            <td><?= $abonnement['nom_ab']; ?></td>
            <td align="center">
                <form method="POST" action="updateAbonnement.php">
                    <input type="submit" name="update" value="Update">
                    <input type="hidden" value=<?PHP echo $abonnement['id_ab']; ?> name="id_ab">
                </form>
            </td>
            <td>
                <a href="deleteAbonnement.php?id=<?php echo $abonnement['id_ab']; ?>"> Delete</a>
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