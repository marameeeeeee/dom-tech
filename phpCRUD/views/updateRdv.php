

<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=conservatoire', 'root', '');

    if (isset($_POST['id_rv'], $_POST['l'], $_POST['d'],$_POST['e'] )) {
        $id_rv = $_POST['id_rv'];
        $lieu = $_POST['l'];
        $date = $_POST['d'];
        $etat = $_POST['e'];


        $sql = "UPDATE rdv SET lieu=:lieu, date=:date WHERE id_rv=:id_rv";
        $stmt = $bdd->prepare($sql);
        $stmt->bindParam(':lieu', $lieu, PDO::PARAM_STR);
        $stmt->bindParam(':date', $date, PDO::PARAM_STR);
        $stmt->bindParam(':id_rv', $id_rv, PDO::PARAM_INT);
        $stmt->bindParam(':etat', $etat, PDO::PARAM_STR);


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
                <a href="listRdvs.php">Back to list</a>
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


