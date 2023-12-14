<?php
if (isset($_GET['id_fb'])) {
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=conservatoire', 'root', '');
        $id_fb = $_GET['id_fb'];

        $sql = "DELETE FROM feedback WHERE id_fb=:id_fb";
        $stmt = $bdd->prepare($sql);
        $stmt->bindParam(':id_fb', $id_fb, PDO::PARAM_INT);

        $result = $stmt->execute();

        if ($result) {
            echo '<script>alert("Suppression terminée");</script>';
            header("Location: listFeeds.php");
            exit();
        } else {
            echo '<script>alert("Suppression échouée")</script>';
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo '<script>alert("ID manquant pour la suppression")</script>';
}
?>