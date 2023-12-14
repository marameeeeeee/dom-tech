<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bonjour Utilisateur</title>
</head>
<body>

<?php
// Vérifier si le paramètre 'user' est présent dans l'URL
if (isset($_GET['user'])) {
    // Échapper les données pour éviter les attaques XSS
    $username = htmlspecialchars($_GET['user']);
    echo "<h1>Bonjour $username !</h1>";
} else {
    echo "<h1>Bonjour Utilisateur !</h1>";
}
?>

</body>
</html>
