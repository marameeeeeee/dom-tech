<?php
// Inclure le fichier de configuration
require_once '../config.php';

try {
    // Récupérer le nom de l'événement depuis la variable GET
    $nom_event = isset($_GET['nom_event']) ? $_GET['nom_event'] : '';

    // Récupérer les données du formulaire
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $adresse_mail = $_POST['adresse_mail'];

    // Ajouter le nom de l'événement à la table participants
    $pdo = config::getConnexion();
    $query = $pdo->prepare("INSERT INTO participants (nom, prenom, nom_event, adresse_mail) VALUES (?, ?, ?, ?)");
    $query->execute([$nom, $prenom, $nom_event, $adresse_mail]);

    echo "Participation enregistrée avec succès.";
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
?>
