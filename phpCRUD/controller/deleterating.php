<?php
include '../Controller/CourstypeC.php';

// Vérifier si le formulaire est soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérifier si les données du formulaire sont présentes
    if (isset($_POST['course_id'])) {
        // Remplacez ceci par la méthode appropriée pour obtenir l'ID de l'utilisateur actuel
        $userId = 1; // Exemple : vous devrez obtenir l'ID de l'utilisateur à partir de votre système d'authentification.

        // Créer une instance de la classe CourstypeC
        $courstypeC = new CourstypeC();

        // Récupérer l'ID du cours et de l'utilisateur
        $courseId = $_POST['course_id'];

        // Appeler la méthode deleteRating pour supprimer la note
        $courstypeC->deleteRating($courseId, $userId);

        // Répondre avec succès (vous pouvez également renvoyer un message JSON)
        echo "Note supprimée avec succès!";
    } else {
        // Répondre avec une erreur si l'ID du cours est manquant
        http_response_code(400);
        echo "ID du cours manquant";
    }
}
?>
