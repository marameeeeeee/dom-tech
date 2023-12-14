<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=conservatoire', 'root', '');

    if (isset($_POST['id_fb'], $_POST['c'], $_POST['e']  )) {
        $id_fb = $_POST['id_fb'];
        $commentaire = $_POST['c'];
        $email = $_POST['e'];


        $sql = "UPDATE feedback SET commentaire=:commentaire, email=:email  WHERE id_fb=:id_fb";
        $stmt = $bdd->prepare($sql);
        $stmt->bindParam(':commentaire', $commentaire, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':id_fb', $id_fb, PDO::PARAM_INT);


        $result = $stmt->execute();

        if ($result) {
            echo '<!DOCTYPE html>
            <html lang="en">
            
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Update Result</title>
                <style>
                    body {
                        background-color: black;
                        color: white;
                        text-align: center;
                        padding: 50px;
                    }
            
                    a {
                        color: #4CAF50;
                        text-decoration: none;
                    }
            
                    a:hover {
                        text-decoration: underline;
                    }
                </style>
            </head>
            
            <body>
                <script>
                    alert("Modification terminée");
                </script>
            
                <p style="font-size: 24px;">Update successful</p>
                <a href="listFeeds.php">Back to list</a>
            </body>
            
            </html>';

        } else {
            echo '<script>alert("modification échouée")</script>';
        }
    } else {
        echo '<script>alert("Paramètres manquants")</script>';
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>