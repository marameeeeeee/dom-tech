<?php
// Récupérez l'e-mail depuis le paramètre dans l'URL
$email = isset($_GET['email']) ? $_GET['email'] : '';

if ($email) {
    // Mettez à jour la base de données pour marquer l'e-mail comme confirmé
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=conservatoire', 'root', '');
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "UPDATE feedback SET confirmed = 1 WHERE email = :email";
        $stmt = $bdd->prepare($sql);
        $stmt->bindValue(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        echo 'Votre e-mail a été confirmé avec succès. Merci!';
    } catch (PDOException $e) {
        echo 'Erreur de base de données: ' . $e->getMessage();
    }
} else {
    echo 'Lien de confirmation invalide. Veuillez contacter le support.';
}
?>
