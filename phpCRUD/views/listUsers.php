<?php
include "../controller/UserC.php";

$c = new UserC();
$tab = $c->listUsers();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    
<style>
        /* Styles CSS */
        body {
            font-family: Arial, sans-serif;
            background-color: #f6f6f6;
            color: #333;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        header {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 20px 0;
        }

        .container {
            margin-top: 50px;
        }

        table {
            border-collapse: collapse;
            width: 70%;
            margin: 0 auto;
        }

        th,
        td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .link {
            color: blue;
            text-decoration: none;
        }

        .link:hover {
            color: red;
        }

        .back-link {
            text-align: center;
            margin-top: 20px;
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
    <div style="text-align: center; margin-top: 20px;">
        <a href="indexad.php" class="link">Back to Profile</a>
    </div>
    
    <?php include 'footer.php'; ?>
</body>

</html>
