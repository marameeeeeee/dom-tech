<?php
include "../controller/UserC.php";

$c = new UserC();
$tab = $c->listUsers();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    
    <style>
        .link {
            color: blue; /* Change this to the desired color */
            text-decoration: none; /* Remove underlines */
        }

        .link:hover {
            color: red; /* Change color on hover if needed */
        }
    </style>
</head>

<body>
    <?php include 'header.php'; ?>
    <div class="container mt-200">
        <center>
            <h1>List of Users</h1>
            <h2>
                <a href="addUser.php" class="link">Add user</a>
            </h2>
        </center>
        <table border="1" align="center" width="70%">
            <tr>
                <th>Id user</th>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Email</th>
                <th>Tel</th>
                <th>Types</th>

                <th>Update</th>
                <th>Delete</th>
            </tr>

            <?php foreach ($tab as $user) { ?>
                <tr>
                    <td><?= $user['idUser']; ?></td>
                    <td><?= $user['nom']; ?></td>
                    <td><?= $user['prenom']; ?></td>
                    <td><?= $user['email']; ?></td>
                    <td><?= $user['tel']; ?></td>
                    <td><?= $user['types']; ?></td>

                    <td align="center">
                        <form method="POST" action="updateUser.php">
                            <input type="submit" name="update" value="Update">
                            <input type="hidden" value=<?PHP echo $user['idUser']; ?> name="idUser">
                        </form>
                    </td>
                    <td>
                        <a href="deleteUser.php?id=<?php echo $user['idUser']; ?>">Delete</a>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </div>
    <?php include 'footer.php'; ?>
</body>

</html>
