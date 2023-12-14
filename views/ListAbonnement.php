<?php
include "../controller/AbonnementC.php";

$c = new AbonnementC();
if(isset($_POST['sortDesc'])) {
    $tab = $c->getAbonnementsSortedByDateDebDesc();
} elseif(isset($_POST['sortAsc'])) {
    $tab = $c->getAbonnementsSortedByDateDebAsc();
} elseif (isset($_GET['reset']) && $_GET['reset'] === 'true') {
    $tab = $c->resetSorting();
} else {
    $tab = $c->listAbonnements();
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Liste des Abonnements </title>
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
        <h1> Liste des Abonnements</h1>
        <h2 style="text-align: center; font-size: 2.2em;">
    <a href="AddAbonnement.php">Ajouter un abonnement</a>
    </h2>
        <h2 style="text-align: center; font-size: 1.2em;">
    
    <form method="POST" action="" style="display: inline-block;">
        <input type="submit" name="sortDesc" value="Sort by Date Deb DESC">
    </form>
    <form method="POST" action="" style="display: inline-block;">
        <input type="submit" name="sortAsc" value="Sort by Date Deb ASC">
    </form>
    </h2>
    <h2 style="text-align: center; font-size: 2.2em;">
    <a href="ListAbonnement.php?reset=true">Reset Sorting</a>
</h2>
        <table border="2.5" align="center" width="70%">
            <!-- Table headers -->
            
            <tr>
                <th>Id Abonnement</th>
                <th>User</th>
                <th>Types</th>
                <th>date_deb</th>
                <th>date_fin</th>
                <th>status</th>
                <th>Payed</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>

            <?php foreach ($tab as $abonnement): ?>
                <tr>
                    <!-- Display pack details -->
                    <td><?= $abonnement['id_ab']; ?></td>
                    <td><?= $abonnement['id_user']; ?></td>
                    <td><?= $abonnement['types']; ?></td>
                    <td><?= $abonnement['date_deb']; ?></td>
                    <td><?= $abonnement['date_fin']; ?></td>
                    <td><?= $abonnement['status']; ?></td>
                    <td><?= $abonnement['payed']; ?></td>
                    
                    <td align="center">
                        <!-- Your Update form -->
                        <form method="POST" action="UpdateAbonnement.php">
                            <input type="submit" name="update" value="Update">
                            <input type="hidden" value="<?= $abonnement['id_ab']; ?>" name="id_ab">
                        </form>
                    </td>
                    <td>
                        <!-- Your Delete link -->
                        <a href="DeleteAbonnement.php?id=<?= $abonnement['id_ab']; ?>">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
        <div class="send-reminder-btn">
        <form action="send_reminder.php" method="post">
            <input type="submit" name="send_email" value="Send Reminder Email">
            
        </form>
    </div>
</div>
    <?php include 'footer.php'; ?>
</body>
</html>