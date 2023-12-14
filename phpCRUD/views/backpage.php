<?php

// Connexion à la base de données
$serveur = "localhost";  // Remplacez par le nom de votre serveur MySQL
$baseDeDonnees = "conservatoire";

// Connexion sans nom d'utilisateur ni mot de passe
$connexion = new mysqli($serveur, '', '', $baseDeDonnees);

// Vérifier la connexion
if ($connexion->connect_error) {
    die("La connexion à la base de données a échoué : " . $connexion->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Traitement des données du formulaire
    $nom = htmlspecialchars($_POST["nom"]);
    $type = htmlspecialchars($_POST["type"]);
    $categorie = htmlspecialchars($_POST["categorie"]);

    // Préparer la requête SQL
    $requete = $connexion->prepare("INSERT INTO cours (nom_de_cours, type, categorie) VALUES (?, ?, ?)");

    // Vérifier la préparation de la requête
    if ($requete === false) {
        die("Erreur de préparation de la requête : " . $connexion->error);
    }

    // Binder les paramètres et exécuter la requête
    $requete->bind_param("sss", $nom, $type, $categorie);
    $resultat = $requete->execute();

    // Vérifier le succès de l'exécution
    if ($resultat === false) {
        die("L'insertion dans la base de données a échoué : " . $connexion->error);
    }

    // Fermer la requête
    $requete->close();

    // Réponse de confirmation
    echo "Données enregistrées avec succès : Nom = $nom, Type = $type, Catégorie = $categorie";
} else {
    // Affichage du formulaire ici
    // Vous pouvez ajouter ici le formulaire HTML pour soumettre les données
}
?>
