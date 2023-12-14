<?php
include "../controller/PacksC.php";

$c = new PackC();
$tab = $c->ListPack();



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Liste des Pack </title>
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
        <h1> Liste des Packs</h1>
        <h2>
            <a href="AddPack.php"> Ajouter un pack </a>
        </h2>
        <table border="2.5" align="center" width="70%">
            <!-- Table headers -->
            <tr>
                <th>Id Pack</th>
                <th>Types</th>
                <th>Name</th>
                <th>Prix</th>
                <th>Description</th>
                <th>Image</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>

            <?php foreach ($tab as $pack): ?>
                <tr>
                    <!-- Display pack details -->
                    <td><?= $pack['id_pack']; ?></td>
                    <td><?= $pack['types']; ?></td>
                    <td><?= $pack['nom']; ?></td>
                    <td><?= $pack['prix']; ?></td>
                    <td><?= $pack['description']; ?></td>
                    <td>
                    <!-- Display image from uploads folder -->
                    <?php
    if (!empty($pack['image'])) {
        $imagePath = '../uploads/' . $pack['image']; // Concatenate folder path with the image filename
        echo '<img src="' . $imagePath . '" alt="image" width="100" height="100">';
    } else {
        echo 'Image not found';
    }
    ?>
                </td>
                    <td align="center">
                        <!-- Your Update form -->
                        <form method="POST" action="UpdatePack.php">
                            <input type="submit" name="update" value="Update">
                            <input type="hidden" value="<?= $pack['id_pack']; ?>" name="id_pack">
                        </form>
                    </td>
                    <td>
                        <!-- Your Delete link -->
                        <a href="DeletePack.php?id=<?= $pack['id_pack']; ?>">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
</div>
    
<a href="indexad.php" class="return-btn">Back to Profile</a>
    <?php include 'footer.php'; ?>
</body>
</html>