<?php
require '../config.php';

//if (isset($_GET['token'])) {
    $token = $_GET['token'];

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $result = mysqli_query($conn, "SELECT * FROM tb_user WHERE reset_token = '$token'");

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $tokenCreationTime = strtotime($row['token_creation_time']);
        $tokenExpirationTime = $tokenCreationTime + (60 * 500); // Temps d'expiration du token : 1 heure

        //if (time() <= $tokenExpirationTime) {
            // Token valide, permettre à l'utilisateur de réinitialiser le mot de passe
            if (isset($_POST['submit'])) {
                $newPassword = $_POST['new_password'];
                $confirmPassword = $_POST['confirm_password'];

                if ($newPassword === $confirmPassword) {
                    $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
                    // Mettre à jour le mot de passe de l'utilisateur dans la base de données
                    mysqli_query($conn, "UPDATE tb_user SET password = '$hashedPassword', reset_token = NULL WHERE reset_token = '$token'");
                    echo "<script>alert('Réinitialisation du mot de passe réussie'); window.location.href = 'login.php';</script>";
                } else {
                    echo "<script>alert('Les mots de passe ne correspondent pas');</script>";
                }
           // }
        //} else {
           // echo "<script>alert('Token invalide ou expiré');</script>";
        //}
    } //else {
       // echo "<script>alert('Token invalide');</script>";
   // }
}// else {
    //echo "<script>alert('Token non trouvé');</script>";
//}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Réinitialiser le mot de passe</title>
    <!-- Ajoutez vos liens CSS ici -->
    <style>
        /* Vos styles CSS */
    </style>
</head>
<body>
    <!-- Votre contenu d'en-tête -->

    <main>
        <h2>Réinitialiser le mot de passe</h2>
        <form action="" method="post">
            <label for="new_password">Nouveau mot de passe :</label>
            <input type="password" name="new_password" required>
            <label for="confirm_password">Confirmez le nouveau mot de passe :</label>
            <input type="password" name="confirm_password" required>
            <button type="submit" name="submit">Réinitialiser le mot de passe</button>
        </form>
    </main>

    <!-- Votre contenu de pied de page -->
</body>
</html>
